<?php
/*
 * This function create By Jignesh Patel	 
 * Function requested by Ajax
 */
if(isset($_REQUEST['fun_type']) && !empty($_REQUEST['fun_type'])){
	switch($_REQUEST['fun_type']){
		case 'get_calender_full':
			get_calender_full($_REQUEST['year'],$_REQUEST['month']);
			break;
		case 'get_events_information':
			get_events_information($_REQUEST['date']);
			break;
		//For Add Event with date wise.
		case 'add_event_information':
			add_event_information($_REQUEST['name'],$_REQUEST['email'],$_REQUEST['mobile'],$_REQUEST['city'],$_REQUEST['event_id']);
			break;
		default:
			break;
	}
}

/*
 * Get Full calendar in html
 */
function get_calender_full($year = '',$month = '')
{
	$date_Year = ($year != '')?$year:date("Y");
	$date_Month = ($month != '')?$month:date("m");
	$date = $date_Year.'-'.$date_Month.'-01';
	$current_Month_First_Day = date("N",strtotime($date));
	$total_Days_ofMonth = cal_days_in_month(CAL_GREGORIAN,$date_Month,$date_Year);
	$total_Days_ofMonthDisplay = ($current_Month_First_Day == 7)?($total_Days_ofMonth):($total_Days_ofMonth + $current_Month_First_Day);
	$boxDisplay = ($total_Days_ofMonthDisplay <= 35)?35:42;
?>

 	<div id="calender_section">
		<h2>
        	<a href="javascript:void(0);" onclick="get_calendar_data('calendar_div','<?php echo date("Y",strtotime($date.' - 1 Month')); ?>','<?php echo date("m",strtotime($date.' - 1 Month')); ?>');">Back</a>
            <select name="month_dropdown" style="padding: 4px;border-radius: 5px;" class="month_dropdown dropdown"><?php echo get_all_months__of_year($date_Month); ?></select>
			<select name="year_dropdown" style="padding: 4px;border-radius: 5px;"  class="year_dropdown dropdown"><?php echo get_year($date_Year); ?></select>
            <a href="javascript:void(0);" onclick="get_calendar_data('calendar_div','<?php echo date("Y",strtotime($date.' + 1 Month')); ?>','<?php echo date("m",strtotime($date.' + 1 Month')); ?>');">Next</a>
        </h2>
        <!-- event_list is used for view event with popup -->
		<div id="event_list" class="modal"></div>
		<!-- End of event list popup -->

        <!--Below Code for Event Add-->

        <!-- Popup div start here -->
		<div id="event_add" class="modal" style="z-index:999;">
		  <div class="modal-content">
			<div class="row centerDiv" >
					<div class="col-lg-6 col-md-6">
						<div class="ud-contact-form-wrapper wow">
							<div style="display:flex;width:100%;">
								<div style="width:80%;"><h3 class="ud-contact-form-title">Suggestion</h3></div><span class="close"><a href="#" onclick="close_popup('event_add')">×</a></span>
							</div>
							<form class="ud-contact-form" method="POST" onsubmit="return false">
								<div class="ud-form-group">
									<label for="name">Full Name*</label>
									<input type="text" id="name" name="name" placeholder="Full Name" />
								</div>
								<div class="ud-form-group">
									<label for="email">Email*</label>
									<input type="email" id="email" name="email" placeholder="Email" />
								</div>
								<div class="ud-form-group">
									<label for="mobile">Mobile*</label>
									<input type="number" id="mobile" value="" placeholder="Mobile No" />
								</div>
								<div class="ud-form-group">
									<label for="city">City*</label>
									<input type="text" id="city" value="" placeholder="City" />
								</div>
								<input id="event_id" value="" type="hidden" />
								<div class="ud-form-group mb-0">
									<button class="ud-main-btn" id="add_event_informationBtn">
										Register
									</button>
								</div>
							</form>
						</div>
					</div>
				</div>
		    	<!-- 
				<p>Register for event <span id="event_nameView"></span></p>
				<p><b>User Name </b><input type="text" id="name" value=""/></p>
				<p><b>Email</b><input type="text" id="email" value=""/></p>
				<p><b>City </b><input type="text" id="mobile" value=""/></p>
				<p><b>Mobile </b><input type="text" id="city" value=""/></p>
				<input id="event_id" value="" type="text" />
				<input type="hidden" id="id" value=""/>
				<input type="button" id="add_event_informationBtn" value="Add"/> -->
		  </div>
		</div>
		<!-- Popup hmmt end. -->

        <div id="calender_section_top">
			<ul>
				<li>SUN</li>
				<li>MON</li>
				<li>TUE</li>
				<li>WED</li>
				<li>THU</li>
				<li>FRI</li>
				<li>SAT</li>
			</ul>
		</div>
		<div id="calender_section_bot">
			<ul>
			<?php 

			// this is for create calendra and view add event and view event and number of Events

				$dayCount = 1; 
				for($cb=1;$cb<=$boxDisplay;$cb++){
					if(($cb >= $current_Month_First_Day+1 || $current_Month_First_Day == 7) && $cb <= ($total_Days_ofMonthDisplay)){
						
						// Below javascript code for get current date
						
						$currentDate = $date_Year.'-'.$date_Month.'-'.$dayCount;
						$eventNum = 0;
							
						// Below line for including file of database connection file
						include 'connection.php';

						// Below query useing for getting number of events in current date

						$result = $db->query("SELECT * FROM events WHERE date = '".$currentDate."' AND active = 1");
						
						$eventNum = $result->num_rows;
						$eventName = '';
						$eventDescription = '';
						$event_id = '';
							if ($eventNum > 0) {
							// output data of each row
							  $row = $result->fetch_assoc();
							  $eventName =  $row["title"];
							  $event_id = $row["id"];
							  $eventDescription = $row["content"];
						  }
						
						//Define date cell color
						if(strtotime($currentDate) == strtotime(date("Y-m-d"))){
							echo '<li date="'.$currentDate.'" class="grey date_cell">';
						}elseif($eventNum > 0){
							echo '<li date="'.$currentDate.'" class="light_sky date_cell">';
						}else{
							echo '<li date="'.$currentDate.'" class="date_cell">';
						}
						//Date cell .'<br>'.$eventDescription
						echo '<span>';
						echo ''.$dayCount.'<br><span style="font-size:10px;">'.$eventName;
						echo '</span></span>';
						if($eventNum>0){
						//Hover event popup
						echo '<div id="date_popup_'.$currentDate.'" class="date_popup_wrap none">';
						echo '<div class="date_window">';
						
							//echo '<div class="popup_event">'.$eventName.'</div>';
							//echo ($eventNum > 0)?'<a href="javascript:;" onclick="get_events_information(\''.$currentDate.'\');">View Events</a><br/>':'';
							//For Add Event
							echo '<div class="popup_event"><strong>'.$eventName.'</strong></div>';
							echo '<div class="popup_event">'.$eventDescription.'</div>';
							echo '<a href="javascript:;" onclick="add_event_information(\''. $event_id.'\',\''. $eventName.'\');">Register</a>';
					
						echo '</div></div>';
					}
						echo '</li>';
						$dayCount++;
			?>
			<?php }else{ ?>
				<li><span>&nbsp;</span></li>
			<?php } } ?>
			</ul>
		</div>
	</div>

	<script type="text/javascript">
	// ajax call to get event detail from database.
		function get_calendar_data(target_div,year,month){
			$.ajax({
				type:'POST',
				url:'cal/cal_function.php',
				data:'fun_type=get_calender_full&year='+year+'&month='+month,
				success:function(html){
					$('#'+target_div).html(html);
				}
			});
		}
		
		function get_events_information(date){
			$.ajax({
				type:'POST',
				url:'cal/cal_function.php',
				data:'fun_type=get_events_information&date='+date,
				success:function(html){
					$('#event_list').html(html);
					$('#event_add').slideUp('slow');
					$('#event_list').slideDown('slow');
				}
			});
		}
		
		/*
		* function name add_event_information
		* Description :- Add Event inforation as per date wise
		* parameter :- date
		*/
		function add_event_information(event_id,name){
			// $('#event_name').val(name);
			// $('#event_email').val(email);
			// $('#event_mobile').val(mobile);
			// $('#event_city').val(city);

			$('#event_id').val(event_id);
			$('#event_nameView').html(name);
			$('#event_list').slideUp('slow');
			$('#event_add').slideDown('slow');
		}

		/*
		*  below code used for save event information into databse. and set message event created successfully.
		*/
		$(document).ready(function(){

			$('#add_event_informationBtn').on('click',function(){
				var event_id = $('#event_id').val();
				var name = $('#name').val();
				var email = $('#email').val();
				var mobile = $('#mobile').val();
				var city = $('#city').val();
				console.log(event_id+' : '+name+' : '+email+' : '+mobile+' : '+city);
				$.ajax({
					type:'POST',
					url:'cal/cal_function.php',
					data:'fun_type=add_event_information&name='+name+'&email='+email+'&mobile='+mobile+'&city='+city+'&event_id='+event_id,
					success:function(data){
						var txt = data.toString();
						var obj = JSON.parse(txt);
						if(obj.res=='success'){
							swal("Success", obj.msg, "success").then((value) => {
								location.reload()
							});
						}else{
							swal("Error", obj.msg, "error");
						}
						// if(msg == 'ok'){
						// 	var dateSplit = date.split("-");
						// 	$('#eventTitle').val('');
						// 	alert('Event Created.');
						// 	get_calendar_data('calendar_div',dateSplit[0],dateSplit[1]);
						// }else{
						// 	alert('Sorry some issues please try again later.');
						// }
					}
				});
			});
		});
		
		$(document).ready(function(){
			$('.date_cell').mouseenter(function(){
				date = $(this).attr('date');
				$(".date_popup_wrap").fadeOut();
				$("#date_popup_"+date).fadeIn();	
			});
			$('.date_cell').mouseleave(function(){
				$(".date_popup_wrap").fadeOut();		
			});
			$('.month_dropdown').on('change',function(){
				get_calendar_data('calendar_div',$('.year_dropdown').val(),$('.month_dropdown').val());
			});
			$('.year_dropdown').on('change',function(){
				get_calendar_data('calendar_div',$('.year_dropdown').val(),$('.month_dropdown').val());
			});
			$(document).click(function(){
				$('#event_list').slideUp('slow');
			});

		});

		
		// Closed popup string	
		function close_popup(event_id)
		{
			$('#'+event_id).css('display','none');
		}
	</script>
<?php
}

/*
 * below function with get all month  list
 * optional parameter >> $selected
 */

function get_all_months__of_year($selected = ''){
	$options = '';
	for($i=1;$i<=12;$i++)
	{
		$value = ($i < 01)?'0'.$i:$i;
		$selectedOpt = ($value == $selected)?'selected':'';
		$options .= '<option value="'.$value.'" '.$selectedOpt.' >'.date("F", mktime(0, 0, 0, $i+1, 0, 0)).'</option>';
	}
	return $options;
}

/*
 * below function with get all year list
 * optional parameter >> $selected
 */
function get_year($selected = ''){
	$options = '';
	for($i=2015;$i<=2025;$i++)
	{
		$selectedOpt = ($i == $selected)?'selected':'';
		$options .= '<option value="'.$i.'" '.$selectedOpt.' >'.$i.'</option>';
	}
	return $options;
}

/********************************************
 * below function used for display event as per date
 * optional parameter is date.
 *******************************************/

function get_events_information($date = ''){
	
		//below line for including file of database connection file

	include 'connection.php';
	$eventListHTML = '';
	$date = $date?$date:date("Y-m-d");
	//Get events based on the current date
	$result = $db->query("SELECT title FROM events WHERE date = '".$date."' AND status = 1");
	if($result->num_rows > 0){
		$eventListHTML .= '<div class="modal-content">';
		$eventListHTML .= '<span class="close"><a href="#" onclick="close_popup("event_list")">×</a></span>';
		$eventListHTML .= '<h2>Events on '.date("l, d M Y",strtotime($date)).'</h2>';
		$eventListHTML .= '<ul>';
		while($row = $result->fetch_assoc()){ 
            $eventListHTML .= '<li>'.$row['title'].'</li>';
        }
		$eventListHTML .= '</ul>';
		$eventListHTML .= '</div>';
	}
	echo $eventListHTML;
}

/**********************************************************
 * below function is used for add event in paraticular date
 * parameter is >>> date , title
 **********************************************************/
function add_event_information($name,$email,$mobile,$city,$event_id){
	include 'connection.php';
	if(empty($name)){
		$myObj['res'] = 'error';
        $myObj['msg'] = 'Enter user name.';
        $myJSON = json_encode($myObj);
        echo $myJSON;
		exit;
	}else if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
		$myObj['res'] = 'error';
        $myObj['msg'] = 'Enter User Email Id.';
        $myJSON = json_encode($myObj);
        echo $myJSON;
		exit;
	}else if(validate_mobile($mobile)==0){
		$myObj['res'] = 'error';
        $myObj['msg'] = 'Enter user mobile.';
        $myJSON = json_encode($myObj);
        echo $myJSON;
		exit;
	}else if(empty($city)){
		$myObj['res'] = 'error';
        $myObj['msg'] = 'Enter user City.';
        $myJSON = json_encode($myObj);
        echo $myJSON;
		exit;
	}else{
		$insert = $db->query("INSERT INTO reg_user (name,email,mobile,city,event_id) VALUES ('".$name."','".$email."','".$mobile."','".$city."','".$event_id."')");
		if($insert){
			$myObj['res'] = 'success';
			$myObj['msg'] = 'Registration done successfully.';
			$myJSON = json_encode($myObj);
			echo $myJSON;
		}else{
			$myObj['res'] = 'error';
			$myObj['msg'] = 'Something went wrong.';
			$myJSON = json_encode($myObj);
			echo $myJSON;
		}
	}
}

function validate_mobile($mobile){
    return preg_match('/^[0-9]{10}+$/', $mobile);
}
?>