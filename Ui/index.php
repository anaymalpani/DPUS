<!doctype html>
<html lang="en">
   <head>
      <meta charset="utf-8" />
      <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
      <title>Material Bootstrap Wizard by ALACRITIC</title>
      <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport' />
      <meta name="viewport" content="width=device-width" />
      <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
      <link rel="apple-touch-icon" sizes="76x76" href="assets/img/apple-icon.png" />
      <link rel="icon" type="image/png" href="assets/img/favicon.png" />
      <!--     Fonts and icons     -->
      <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700|Roboto+Slab:400,700|Material+Icons" />
      <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css" />
      <!-- CSS Files -->
      <link href="assets/css/bootstrap.min.css" rel="stylesheet" />
      <link href="assets/css/material-bootstrap-wizard.css" rel="stylesheet" />
      <!-- CSS Just for demo purpose, don't include it in your project -->
      <link href="assets/css/demo.css" rel="stylesheet" />
   </head>
   <body>
      <div class="image-container set-full-height" style="background-image: url('assets/img/wizard-city.jpg')">
         <!--   ALACRITIC Branding   -->
         <a href="http://ALACRITIC.COM">
            <div class="logo-container">
               <div class="logo">
                  <img src="assets/img/new_logo.png">
               </div>
               <div class="brand">
                  ALACRITIC
               </div>
            </div>
         </a>
         <!--  Made With Material Kit  
            <a href="http://demos.ALACRITIC.COM/material-kit/index.html?ref=material-bootstrap-wizard" class="made-with-mk">
            	<div class="brand">MK</div>
            	<div class="made-with">Made with <strong>Material Kit</strong></div>
            </a>-->
         <!--   Big container   -->
         <div class="container">
            <div class="row">
               <div class="col-sm-8 col-sm-offset-2">
                  <!--      Wizard container        -->
                  <div class="wizard-container">
                     <div class="card wizard-card" data-color="purple" id="wizard">
                        <form action="" method="">
                           <!--        You can switch " data-color="rose" "  with one of the next bright colors: "blue", "green", "orange", "purple"        -->
                           <div class="wizard-header">
                              <h3 class="wizard-title">
                                 Symptom Checker
                              </h3>
                              <h5>This information will let us know more about your place.</h5>
                           </div>
                           <div class="wizard-navigation">
                              <ul>
                                 <li><a href="#location" data-toggle="tab">Info</a></li>
                                 <li><a href="#type" data-toggle="tab">Symptoms </a></li>
                                 <li><a href="#facilities" data-toggle="tab">Overview</a></li>
                                 <li><a href="#causes" data-toggle="tab">Causes</a></li>
                                 <li><a href="#Diagnosis" data-toggle="tab">Diagnosis</a></li>
                                 <li><a href="#Treatment" data-toggle="tab">Treatment</a></li>
                              </ul>
                           </div>
                           <div class="tab-content">
                              <div class="tab-pane" id="location">
                                 <div class="row">
                                    <div class="wizard-header">
                                       <h3 class="wizard-title">
                                          Symptom Checker
                                       </h3>
                                    </div>
                                    <div class="col-sm-12">
                                    </div>
                                    <div class="col-sm-5 col-sm-offset-1">
                                       <div class="form-group label-floating">
                                          <label class="control-label">AGE</label>
                                          <input type="text" class="form-control" id="myText">
                                       </div>
                                    </div>
                                    <div class="col-sm-5">
                                       <div class="form-group label-floating">
                                          <label class="control-label">Gender</label>
                                          <select name="country" class="form-control">
                                             <option disabled="" selected=""></option>
                                             <option value="Male"> Male </option>
                                             <option value="Femail"> Femail </option>
                                             <option value="Other"> Other </option>
                                          </select>
                                       </div>
                                    </div>
                                 </div>
                              </div>
                              <div class="tab-pane" id="type">
                                 <script>
                                    var syms = []
                                    
                                    function updateList() {
                                    	let lis = ""
                                    	syms.map((data, i) => {
                                    		lis += "<li>" + data + "</li>"
                                    	})
                                    
                                    	$("#sym_list")[0].innerHTML = `
                                    		<ul>`
                                    		+ lis +
                                    		`</ul>
                                    	`
                                    }
                                    
                                    $(document).ready(function(){
                                    
                                    	// bind method to add symptom button
                                    
                                    	$("#add_symptom").click(() => {
                                    		let sym = $("input[list='datalist1']")[0].value
                                    		syms.push(sym)
                                    		updateList()
                                    		$("input[list='datalist1']")[0].value = ""
                                    	});
                                    	
                                    var bimari;
                                    	$("#diag").click(() => {
                                    		$.post(
                                    			"http://localhost:8000/symptoms",
                                    			{
                                    				symptoms : syms
                                    			},
                                    			(data, status) => {
                                    				if(data.error){
                                               console.log(data.error)
                                    				} else {
                                    					// no error occuredro 
                                         			syms = []
                                    					updateList()
                                    
                                               // you can access data via data.key
                                               var bimari = data.desease
                                               $("#result")[0].innerHTML = `
                                                 <h2 id="head2">
                                                   ` + bimari + `
                                                 </h2>
                                               `
                                    				
                                    		
                                    		$(function() {
                                         //var bimari = "acne";
                                      var view_data;
                                           $.ajax({
                                               url: "https://api.nhs.uk/conditions/" + bimari,
                                               beforeSend: function(xhrObj){
                                                   // Request headers
                                                   xhrObj.setRequestHeader("subscription-key","802d5323546045efab3767beabde66bf");
                                               },
                                               type: "GET",
                                               // Request body
                                               data: "{body}",
                                           })
                                           .done(function(data) {
                                               alert("success");
                                    		console.log(data); 
                                    		$( '#div0').html( data.description );
                                    		$( '#div1').html( data.mainEntityOfPage[0].mainEntityOfPage[0].text );
                                    		$( '#div2').html( data.mainEntityOfPage[1].mainEntityOfPage[0].text );
                                    		$( '#div3').html( data.mainEntityOfPage[2].mainEntityOfPage[0].text );
                                    		$( '#div4').html( data.mainEntityOfPage[3].mainEntityOfPage[0].text );
                                    		$( '#div5').html( data.mainEntityOfPage[4].mainEntityOfPage[0].text );
                                    		$( '#div6').html( data.mainEntityOfPage[5].mainEntityOfPage[0].text );
                                           })
                                           .fail(function() {
                                               alert("error");
                                           });
                                       });
                                    function doWork(data)
                                    {
                                       //perform work here
                                    $("#div1").html(data);
                                    }
                                    		
                                    				
                                    				}
                                    			},
                                    			"json"
                                    		)
                                    	})
                                    
                                        // $("button").click(function(){
                                        //     $.get("demo_test.asp", function(data, status){
                                        //         alert("Data: " + data + "\nStatus: " + status);
                                        //     });
                                    
                                        //     $.post("/postmethod", {
                                        //     	jsdata: data
                                        //     }, (data, status) => {
                                    
                                        //     }, "json");
                                    
                                        // });
                                    });
                                    
                                    
                                     /*   $(function() {
                                         //var bimari = "acne";
                                      var view_data;
                                           $.ajax({
                                               url: "https://api.nhs.uk/conditions/" + bimari,
                                               beforeSend: function(xhrObj){
                                                   // Request headers
                                                   xhrObj.setRequestHeader("subscription-key","802d5323546045efab3767beabde66bf");
                                               },
                                               type: "GET",
                                               // Request body
                                               data: "{body}",
                                           })
                                           .done(function(data) {
                                              // alert("success");
                                    		console.log(data); 
                                    		$( '#div1').html( data.description );
                                           })
                                           .fail(function() {
                                               alert("error");
                                           });
                                       });*/
                                 </script>
                                 <h4 class="info-text">Symptom Categoery  </h4>
                                 <div class="row">
                                    <div class="col-sm-12">
                                       <div class="col-sm-6 col-sm-offset-1">
                                          <div class="form-group label-floating">
                                             <label class="control-label">Add Symptom </label>
                                             <div class="input-group">
                                                <input type="text" class="form-control" list="datalist1" size="50" placeholder="Symptoms" value="" required>
                                                <!-- (((((((	bloody_stool	irritation_in_anus	neck_pain	dizziness	cramps	bruising	obesity	swollen_legs	swollen_blood_vessels	puffy_face_and_eyes	enlarged_thyroid	brittle_nails	swollen_extremeties	excessive_hunger	extra_marital_contacts	drying_and_tingling_lips	slurred_speech	knee_pain	hip_joint_pain	muscle_weakness	stiff_neck	swelling_joints	movement_stiffness	spinning_movements	loss_of_balance	unsteadiness	weakness_of_one_body_side	loss_of_smell	bladder_discomfort	foul_smell_of urine	continuous_feel_of_urine	passage_of_gases	internal_itching	toxic_look_(typhos)	depression	irritability	muscle_pain	altered_sensorium	red_spots_over_body	belly_pain	abnormal_menstruation	dischromic _patches	watering_from_eyes	increased_appetite	polyuria	family_history	mucoid_sputum	rusty_sputum	lack_of_concentration	visual_disturbances	receiving_blood_transfusion	receiving_unsterile_injections	coma	stomach_bleeding	distention_of_abdomen	history_of_alcohol_consumption	fluid_overload	blood_in_sputum	prominent_veins_on_calf	palpitations	painful_walking	pus_filled_pimples	blackheads	scurring	skin_peeling	silver_like_dusting	small_dents_in_nails	inflammatory_nails	blister	red_sore_around_nose	yellow_crust_ooze
                                                   Click here to Reply or Forward
                                                   4.4 GB (29%) of 15 GB used
                                                   Manage
                                                   Terms - Privacy
                                                   Last account activity: 4 minutes ago
                                                   Details
                                                   ))))))) --> 
                                                <datalist id="datalist1">
                                                   <option value="Itching" default>
                                                   <option value="Skin Rash">
                                                   <option value="Nodal Skin Eruptions">
                                                   <option value="Continuous Sneezing">
                                                   <option value="Shivering">
                                                   <option value="Chills">
                                                   <option value="Joint Pain">
                                                   <option value="Stomach Pain">
                                                   <option value="Acidity">
                                                   <option value="Ulcers On Tongue">
                                                   <option value="Muscle Wasting">
                                                   <option value="Vomiting">
                                                   <option value="Burning Micturition">
                                                   <option value="Spotting Urination">
                                                   <option value="Fatigue">
                                                   <option value="Weight Gain">
                                                   <option value="Anxiety">
                                                   <option value="Cold Hands And Feet">
                                                   <option value="Mood Swings">
                                                   <option value="Weight Loss">
                                                   <option value="Restlessness">
                                                   <option value="Lethargy">
                                                   <option value="Patches In Throat">
                                                   <option value="Irregular Sugar Level">
                                                   <option value="Cough">
                                                   <option value="High Fever">
                                                   <option value="Sunken Eyes">
                                                   <option value="Breathlessness">
                                                   <option value="Sweating"> 
                                                   <option value="Dehydration">
                                                   <option value="Indigestion">
                                                   <option value="Headache">
                                                   <option value="Yellowish Skin">
                                                   <option value="Dark Urine">
                                                   <option value="Nausea">
                                                   <option value="Loss Of Appetite">
                                                   <option value="Pain Behind The Eyes">
                                                   <option value="Back Pain">
                                                   <option value="Constipation">
                                                   <option value="Abdominal Pain">
                                                   <option value="Diarrhoea">
                                                   <option value="Mild Fever">
                                                   <option value="Yellow Urine">
                                                   <option value="Yellowing Of Eyes">
                                                   <option value="Acute Liver Failure">
                                                   <option value="Fluid Overload">
                                                   <option value="Swelling Of Stomach	">
                                                   <option value="Swelled Lymph Nodes">
                                                   <option value="Malaise">
                                                   <option value="Blurred And Distorted Vision">
                                                   <option value="Phlegm">
                                                   <option value="Throat Irritation">
                                                   <option value="Redness Of Eyes">
                                                   <option value="Sinus Pressure">
                                                   <option value="Runny Nose">
                                                   <option value="Congestion">
                                                   <option value="Chest Pain">
                                                   <option value="Weakness In Limbs">
                                                   <option value="Fast Heart Rate">
                                                   <option value="Pain During Bowel Movements">
                                                   <option value="Pain In Anal Region">
                                                   <option value="Bloody Stool">
                                                   <option value="Irritation In Anus">
                                                   <option value="Neck Pain">
                                                   <option value="Chills">
                                                   <option value="Chills">
                                                   <option value="Chills">
                                                   <option value="Chills">
                                                   <option value="Chills">
                                                   <option value="Chills">
                                                   <option value="Chills">
                                                   <option value="Chills">
                                                </datalist>
                                                <div class="input-group-btn">
                                                <button type="button" class="btn btn-danger" id="add_symptom" onclick="myFunction()">Enter Symptom</button>
                                                </div>
                                             </div>
                                          </div>
                                       </div>
                                       <div class="col-sm-4 col-sm-offset-1">
                                       <div class="form-group label-floating">
                                       <div class="form-group label-floating">
                                       <div class="col-sm-4 col-sm-offset-1">
                                       <p>Age <p id="demo"></p></p>
                                       </div>
                                       <div class="col-sm-4 col-sm-offset-1">
                                       <p>Gender male</p>
                                       </div>
                                       <br>
                                       <br>
                                       <h4>My Symptoms</h4>
                                       <div class="container">
                                       <div class="row">
                                       <div class="col-md-6">
                                       <div id="sym_list"></div>
                                       </div>
                                       </div>
                                       </div>
									   
                                       <br>
                                       <br>
									   
										   <div class="input-group-btn">
										   <button type="button" class="btn btn-success"  id="diag">Show Disease</button>
										   </div>
												
                                       </div>
                                       </div>
                                       </div>
                                    </div>
                                 </div>
                              </div>
                              <div class="tab-pane" id="facilities">
                              <h4 class="info-text">Please tell us more </h4>
                              <div class="row">
                              <h4 class="info-text"> 
                              <div id="result"></div> 
                              </h4>
                              <div class="col-sm-6 col-sm-offset-1">
                              <div class="form-group label-floating">
                              <div class="form-group label-floating">
                              <p>Which symptom is bothering you the most? </p>
                              <div class="container">
                              <div class="row">
                              <div class="col-md-6">
                              <div id="sym_list"></div>
                              </div>
                              </div>
                              </div>
                              </div>
                              <p></p>
                              <div class="form-group label-floating">
                              <label class="control-label">Current medications (Optional) </label>
                              <p class="description"><div id="div2"></div></p>
                              </div>
                              </div>
                              </div>
                              <div class="col-sm-4">
                              <div class="form-group label-floating">
                              <label class="control-label">Example</label>
                              <p class="description"><div id="div1"></div></p>
                              </div>
                              </div>
                              </div>
                              </div>
                              <div class="tab-pane" id="causes">
                              <div class="row">
                              <h4 class="info-text"> Causes of <div id="result"> </div></h4>
                              <div class="col-sm-8">
                              <div class="form-group label-floating">
                              <label class="control-label">Causes</label>
                              <p class="description"><div id="div3"></div></p>
                              </div>
                              </div>
                              </div>
                              </div>
                              <div class="tab-pane" id="Diagnosis">
                              <div class="row">
                              <h4 class="info-text"> Diagnosis of <div id="result"> </div></h4>
                              <div class="col-sm-8">
                              <div class="form-group label-floating">
                              <label class="control-label">Diagnosis</label>
                              <p class="description"><div id="div4"></div></p>
                              </div>
                              </div>
                              </div>
                              </div>
                              <div class="tab-pane" id="Treatment">
                              <div class="row">
                              <h4 class="info-text"> Treatment of <div id="result"> </div></h4>
                              <div class="col-sm-8">
                              <div class="form-group label-floating">
                              <label class="control-label">Treatment</label>
                              <p class="description"><div id="div5"></div></p>
                              </div>
                              </div>
                              </div>
                              </div>
                           </div>
                           <div class="wizard-footer">
                           <div class="pull-right">
                           <input type='button' class='btn btn-next btn-fill btn-primary btn-wd' name='continue' value='Next' />
                           <input type='button' class='btn btn-finish btn-fill btn-primary btn-wd' name='finish' value='Finish' />
                           </div>
                           <div class="pull-left">
                           <input type='button' class='btn btn-previous btn-fill btn-default btn-wd' name='previous' value='Previous' />
                           </div>
                           <div class="clearfix"></div>
                           </div>
                        </form>
                     </div>
                  </div>
                  <!-- wizard container -->
               </div>
            </div>
            <!-- row -->
         </div>
         <!--  big container -->
         <div class="footer">
         <div class="container text-center">
         Made with <i class="fa fa-heart heart"></i> by <a href="http://www.ALACRITIC.COM">ALACRITIC</a></a>
         </div>
         </div>
      </div>
      <style>
      .@media (min-width: 768px)
      .col-sm-offset-2 {
      margin-left: 0;
      }
      .@media (min-width: 768px)
      .col-sm-8 {
      width: 100%;
      }
      p {
      font-size: 16px;
      color: #131212;
      margin: 0 0 10px;
      font-weight: 400;
      }
      h4, .h4 {
      font-size: 1.3em;
      line-height: 1.4em;
      font-weight: 400;
      color: #060606;
      }
      </style>
      <script>
         function myFunction() {
           var x = document.getElementById("myText").value;
           document.getElementById("demo").innerHTML = x;
         }
      </script>
   </body>
   <!--   Core JS Files   -->
   <script src="assets/js/jquery-2.2.4.min.js" type="text/javascript"></script>
   <script src="assets/js/bootstrap.min.js" type="text/javascript"></script>
   <script src="assets/js/jquery.bootstrap.js" type="text/javascript"></script>
   <!--  Plugin for the Wizard -->
   <script src="assets/js/material-bootstrap-wizard.js"></script>
   <!--  More information about jquery.validate here: http://jqueryvalidation.org/	 -->
   <script src="assets/js/jquery.validate.min.js"></script>
</html>