<!DOCTYPE html>
<html>
<head>
	<title>Your timer is our passion - Create an Account</title>
	<?php include 'incs/header.php';?>
	<link rel="stylesheet" type="text/css" href="dist/css/forms.css">
	<style>
		.forContainer {
			width: 60%;
			margin: 2em auto;
		}
	</style>
</head>
<body>
	<div class="main_container">
		<?php include 'incs/nav.php';?>
		<div class="container-fluid">
			<div class="container mt-5 mb-5">
				<div class="row">
					<div class="col-md-12">
						<form name="SaveApplicantForm" action="createAccount.php" method="post">   
							<table class="table table-borderless" style="width: 100%">
							 	<div class="forContainer ">
							 		<div class="row">
										<div class="col-md-3 mb-3"><label class="fw-bold float-end">NRC (or Passport number If Non - Zambian):</label></div>
										<div class="col-md-9 mb-3"><input class="form-control" name="NRC" type="text" id="NRC"> This will be your provisional TCZ number</div>
			
 
										<div class="col-md-3 mb-3"><label class="fw-bold float-end">I am :</label></div>
										<div class="col-md-9 mb-3">
											<select class="form-control" name="Class" id="Class">
												<option value="">-Select-</option>
												 <!-- <option value="Student">Student</option> -->
												<option value="Early Childhood Teacher">Early Childhood Teacher</option>
												<option value="Primary School Teacher">Primary School Teacher</option>
												<option value="Secondary School Teacher">Secondary School Teacher</option>
												<option value="Special Education Teacher">Special Education Teacher</option>
												<option value="Education Administrator">Education Administrator</option>
												<option value="College Lecturer">College Lecturer</option>
												<option value="Guidance and Counseling Teacher">Guidance and Counseling Teacher</option>	
												<option value="Community School Teacher">Community School Teacher</option>
												<option value="Assistant Teacher">Assistant Teacher</option>
												<option value="Associate Teacher">Associate Teacher</option>		
											</select>
										</div>
  			 

										<div class="col-md-3 mb-3"><label class="fw-bold float-end">Email:</label></div>
										<div class="col-md-9 mb-3"><input class="form-control" name="Email" type="email" id="Email">More instructions will be sent to this address</div>
			
										<div class="col-md-3 mb-3"><label class="fw-bold float-end">Title:</label></div>
										<div class="col-md-9 mb-3">
											<select class="form-control" name="Title" id="Title">
												<option value="">-Select-</option>
												<option>Mr</option>
												<option>Ms</option>	
												<option>Dr</option>	
												<option>Prof</option>			
											</select>
										</div>
			
										<div class="col-md-3 mb-3"><label class="fw-bold float-end">Surname:</label></div>
										<div class="col-md-9 mb-3"><input class="form-control" name="Surname" type="text" id="Surname"> </div>
			
										<div class="col-md-3 mb-3"><label class="fw-bold float-end">Forename:</label></div>
										<div class="col-md-9 mb-3"><input class="form-control" name="Forename" type="text" id="Forename"></div>
			
										<div class="col-md-3 mb-3"><label class="fw-bold float-end">Maiden Name:</label></div>
										<div class="col-md-9 mb-3"><input class="form-control" name="MaidenName" type="text" id="MaidenName"> leave blank if none</div>
			
										<div class="col-md-3 mb-3"><label class="fw-bold float-end">Date Of Birth:</label></div>
										<div class="col-md-9 mb-3"><input class="form-control" name="DateOfBirth" type="date" id="DateOfBirth">eg. dd/mm/yyyy</div>
			
										<div class="col-md-3 mb-3"><label class="fw-bold float-end">Marital Status:</label></div>
										<div class="col-md-9 mb-3">
										 	<select class="form-control" name="MaritalStatus" id="MaritalStatus">
										 		<option value="">-Select-</option>
												<option value="Single">Single</option>
												<option value="Married">Married</option>
												<option value="Widowed">Divorced</option>	
												<option value="Widowed">Widowed</option>					
											</select>
										</div>
			
										<div class="col-md-3 mb-3"><label class="fw-bold float-end">Gender:</label></div>
										<div class="col-md-9 mb-3">
										 	<select class="form-control" name="Gender" id="Gender">
										 		<option value="">-Select-</option>
												<option value="Male">Male</option>
												<option value="Female">Female</option>					
											</select>
										</div>
			
										<div class="col-md-3 mb-3"><label class="fw-bold float-end">Nationality:</label></div>
										<div class="col-md-9 mb-3">
											<select class="form-control" name="Nationality" id="Nationality">
												<option value="">-select-</option>
												<option value="afghan">Afghan</option>
												<option value="albanian">Albanian</option>
												<option value="algerian">Algerian</option>
												<option value="american">American</option>
												<option value="andorran">Andorran</option>
												<option value="angolan">Angolan</option>
												<option value="antiguans">Antiguans</option>
												<option value="argentinean">Argentinean</option>
												<option value="armenian">Armenian</option>
												<option value="australian">Australian</option>
												<option value="austrian">Austrian</option>
												<option value="azerbaijani">Azerbaijani</option>
												<option value="bahamian">Bahamian</option>
												<option value="bahraini">Bahraini</option>
												<option value="bangladeshi">Bangladeshi</option>
												<option value="barbadian">Barbadian</option>
												<option value="barbudans">Barbudans</option>
												<option value="batswana">Batswana</option>
												<option value="belarusian">Belarusian</option>
												<option value="belgian">Belgian</option>
												<option value="belizean">Belizean</option>
												<option value="beninese">Beninese</option>
												<option value="bhutanese">Bhutanese</option>
												<option value="bolivian">Bolivian</option>
												<option value="bosnian">Bosnian</option>
												<option value="brazilian">Brazilian</option>
												<option value="british">British</option>
												<option value="bruneian">Bruneian</option>
												<option value="bulgarian">Bulgarian</option>
												<option value="burkinabe">Burkinabe</option>
												<option value="burmese">Burmese</option>
												<option value="burundian">Burundian</option>
												<option value="cambodian">Cambodian</option>
												<option value="cameroonian">Cameroonian</option>
												<option value="canadian">Canadian</option>
												<option value="cape verdean">Cape Verdean</option>
												<option value="central african">Central African</option>
												<option value="chadian">Chadian</option>
												<option value="chilean">Chilean</option>
												<option value="chinese">Chinese</option>
												<option value="colombian">Colombian</option>
												<option value="comoran">Comoran</option>
												<option value="congolese">Congolese</option>
												<option value="costa rican">Costa Rican</option>
												<option value="croatian">Croatian</option>
												<option value="cuban">Cuban</option>
												<option value="cypriot">Cypriot</option>
												<option value="czech">Czech</option>
												<option value="danish">Danish</option>
												<option value="djibouti">Djibouti</option>
												<option value="dominican">Dominican</option>
												<option value="dutch">Dutch</option>
												<option value="east timorese">East Timorese</option>
												<option value="ecuadorean">Ecuadorean</option>
												<option value="egyptian">Egyptian</option>
												<option value="emirian">Emirian</option>
												<option value="equatorial guinean">Equatorial Guinean</option>
												<option value="eritrean">Eritrean</option>
												<option value="estonian">Estonian</option>
												<option value="ethiopian">Ethiopian</option>
												<option value="fijian">Fijian</option>
												<option value="filipino">Filipino</option>
												<option value="finnish">Finnish</option>
												<option value="french">French</option>
												<option value="gabonese">Gabonese</option>
												<option value="gambian">Gambian</option>
												<option value="georgian">Georgian</option>
												<option value="german">German</option>
												<option value="ghanaian">Ghanaian</option>
												<option value="greek">Greek</option>
												<option value="grenadian">Grenadian</option>
												<option value="guatemalan">Guatemalan</option>
												<option value="guinea-bissauan">Guinea-Bissauan</option>
												<option value="guinean">Guinean</option>
												<option value="guyanese">Guyanese</option>
												<option value="haitian">Haitian</option>
												<option value="herzegovinian">Herzegovinian</option>
												<option value="honduran">Honduran</option>
												<option value="hungarian">Hungarian</option>
												<option value="icelander">Icelander</option>
												<option value="indian">Indian</option>
												<option value="indonesian">Indonesian</option>
												<option value="iranian">Iranian</option>
												<option value="iraqi">Iraqi</option>
												<option value="irish">Irish</option>
												<option value="israeli">Israeli</option>
												<option value="italian">Italian</option>
												<option value="ivorian">Ivorian</option>
												<option value="jamaican">Jamaican</option>
												<option value="japanese">Japanese</option>
												<option value="jordanian">Jordanian</option>
												<option value="kazakhstani">Kazakhstani</option>
												<option value="kenyan">Kenyan</option>
												<option value="kittian and nevisian">Kittian and Nevisian</option>
												<option value="kuwaiti">Kuwaiti</option>
												<option value="kyrgyz">Kyrgyz</option>
												<option value="laotian">Laotian</option>
												<option value="latvian">Latvian</option>
												<option value="lebanese">Lebanese</option>
												<option value="liberian">Liberian</option>
												<option value="libyan">Libyan</option>
												<option value="liechtensteiner">Liechtensteiner</option>
												<option value="lithuanian">Lithuanian</option>
												<option value="luxembourger">Luxembourger</option>
												<option value="macedonian">Macedonian</option>
												<option value="malagasy">Malagasy</option>
												<option value="malawian">Malawian</option>
												<option value="malaysian">Malaysian</option>
												<option value="maldivan">Maldivan</option>
												<option value="malian">Malian</option>
												<option value="maltese">Maltese</option>
												<option value="marshallese">Marshallese</option>
												<option value="mauritanian">Mauritanian</option>
												<option value="mauritian">Mauritian</option>
												<option value="mexican">Mexican</option>
												<option value="micronesian">Micronesian</option>
												<option value="moldovan">Moldovan</option>
												<option value="monacan">Monacan</option>
												<option value="mongolian">Mongolian</option>
												<option value="moroccan">Moroccan</option>
												<option value="mosotho">Mosotho</option>
												<option value="motswana">Motswana</option>
												<option value="mozambican">Mozambican</option>
												<option value="namibian">Namibian</option>
												<option value="nauruan">Nauruan</option>
												<option value="nepalese">Nepalese</option>
												<option value="new zealander">New Zealander</option>
												<option value="ni-vanuatu">Ni-Vanuatu</option>
												<option value="nicaraguan">Nicaraguan</option>
												<option value="nigerien">Nigerien</option>
												<option value="north korean">North Korean</option>
												<option value="northern irish">Northern Irish</option>
												<option value="norwegian">Norwegian</option>
												<option value="omani">Omani</option>
												<option value="pakistani">Pakistani</option>
												<option value="palauan">Palauan</option>
												<option value="panamanian">Panamanian</option>
												<option value="papua new guinean">Papua New Guinean</option>
												<option value="paraguayan">Paraguayan</option>
												<option value="peruvian">Peruvian</option>
												<option value="polish">Polish</option>
												<option value="portuguese">Portuguese</option>
												<option value="qatari">Qatari</option>
												<option value="romanian">Romanian</option>
												<option value="russian">Russian</option>
												<option value="rwandan">Rwandan</option>
												<option value="saint lucian">Saint Lucian</option>
												<option value="salvadoran">Salvadoran</option>
												<option value="samoan">Samoan</option>
												<option value="san marinese">San Marinese</option>
												<option value="sao tomean">Sao Tomean</option>
												<option value="saudi">Saudi</option>
												<option value="scottish">Scottish</option>
												<option value="senegalese">Senegalese</option>
												<option value="serbian">Serbian</option>
												<option value="seychellois">Seychellois</option>
												<option value="sierra leonean">Sierra Leonean</option>
												<option value="singaporean">Singaporean</option>
												<option value="slovakian">Slovakian</option>
												<option value="slovenian">Slovenian</option>
												<option value="solomon islander">Solomon Islander</option>
												<option value="somali">Somali</option>
												<option value="south african">South African</option>
												<option value="south korean">South Korean</option>
												<option value="spanish">Spanish</option>
												<option value="sri lankan">Sri Lankan</option>
												<option value="sudanese">Sudanese</option>
												<option value="surinamer">Surinamer</option>
												<option value="swazi">Swazi</option>
												<option value="swedish">Swedish</option>
												<option value="swiss">Swiss</option>
												<option value="syrian">Syrian</option>
												<option value="taiwanese">Taiwanese</option>
												<option value="tajik">Tajik</option>
												<option value="tanzanian">Tanzanian</option>
												<option value="thai">Thai</option>
												<option value="togolese">Togolese</option>
												<option value="tongan">Tongan</option>
												<option value="trinidadian or tobagonian">Trinidadian or Tobagonian</option>
												<option value="tunisian">Tunisian</option>
												<option value="turkish">Turkish</option>
												<option value="tuvaluan">Tuvaluan</option>
												<option value="ugandan">Ugandan</option>
												<option value="ukrainian">Ukrainian</option>
												<option value="uruguayan">Uruguayan</option>
												<option value="uzbekistani">Uzbekistani</option>
												<option value="venezuelan">Venezuelan</option>
												<option value="vietnamese">Vietnamese</option>
												<option value="welsh">Welsh</option>
												<option value="yemenite">Yemenite</option>
												<option value="zambian">Zambian</option>
												<option value="zimbabwean">Zimbabwean</option>
											</select>

										</div>
			
										<div class="col-md-3 mb-3"><label class="fw-bold float-end">Create Your Password:</label></div>
										<div class="col-md-9 mb-3">
											<div class="input-group">
					                        	<input id="Password1" class="form-control input-md" name="Password1" type="password" placeholder="Enter your password" required>

						                        <span class="input-group-text show-pass" id="showpass" onclick="toggle()">
						                            <i class="bi bi-eye" onclick="myFunction(this)"></i>
						                        </span>
						                    </div>
						                    You will login in applicant portal using this password
										</div>
			
										<div class="col-md-3 mb-3"><label class="fw-bold float-end">Confirm Password:</label></div>
										<div class="col-md-9 mb-3">
											<!-- <input class="form-control" name="Password2" type="password" id="Password2"> -->
											<div class="input-group">
					                        	<input id="Password2" class="form-control input-md" name="Password2" type="password" placeholder="Enter your password" required>

						                        <span class="input-group-text show-pass" id="showpass2" onclick="toggle2()">
						                            <i class="bi bi-eye"></i>
						                        </span>
						                    </div>
										</div>
			
										<div class="col-md-12 mb-5">
									 		<h3>Contact Details</h3>
									 	</div>
										
			 
										<div class="col-md-3 mb-3"><label class="fw-bold float-end">Phone number:</label></div>
										<div class="col-md-9 mb-3"><input class="form-control" name="Phone" type="text" id="Phone">TCZ will get in touch with you on this number</div>
			     
										<div class="col-md-3 mb-3"><label class="fw-bold float-end">Postal address:</label></div>
										<div class="col-md-9 mb-3"><input class="form-control" name="PostalAddress" type="text" id="PostalAddress"></div>
			
            							<div class="col-md-3 mb-3"><label class="fw-bold float-end">District:</label></div>
            							<div class="col-md-9 mb-3">
            								<select class="form-control" name="District" id="District">
            									<option value="">-Select-</option>
												<option value="0401_04">CHADIZA</option><option value="1001_10">CHAMA</option><option value="0411_04">CHASEFU</option><option value="0601_06">CHAVUMA</option><option value="0210_02">CHEMBE</option><option value="0701_07">CHIBOMBO</option><option value="0207_02">CHIENGI</option><option value="0212_02">CHIFUNABULI</option><option value="0311_03">CHIKANKANTA</option><option value="0905_09">CHILANGA</option><option value="0501_05">CHILILABOMBWE</option><option value="0101_01">CHILUBI</option><option value="0502_05">CHINGOLA</option><option value="1002_10">CHINSALI</option><option value="0410_04">CHIPANGALI</option><option value="0402_04">CHIPATA</option><option value="0208_02">CHIPILI</option><option value="0906_09">CHIRUNDU</option><option value="0707_07">CHISAMBA</option><option value="0708_07">CHITAMBO</option><option value="0301_03">CHOMA</option><option value="0901_09">CHONGWE</option><option value="0302_03">GWEMBE</option><option value="0608_06">IKELENGE</option><option value="1003_10">ISOKA</option><option value="0711_07">ITEZHI-TEZHI</option><option value="0602_06">KABOMPO</option><option value="0702_07">KABWE</option><option value="0902_09">KAFUE</option><option value="0801_08">KALABO</option><option value="0303_03">KALOMO</option><option value="0503_05">KALULUSHI</option><option value="0611_06">KALUMBILA</option><option value="1009_10">KANCHIBIYA</option><option value="0802_08">KAOMA</option><option value="0703_07">KAPIRIMPOSHI</option><option value="0102_01">KAPUTA</option><option value="0103_01">KASAMA</option><option value="0603_06">KASEMPA</option><option value="0412_04">KASENENGWA</option><option value="0403_04">KATETE</option><option value="0201_02">KAWAMBWA</option><option value="0310_03">KAZUNGULA</option><option value="0504_05">KITWE</option><option value="1008_10">LAVUSHIMANDA</option><option value="0808_08">LIMULUNGA</option><option value="0304_03">LIVINGSTONE</option><option value="0810_08">LUAMPA</option><option value="0903_09">LUANGWA</option><option value="0709_07">LUANO</option><option value="0505_05">LUANSHYA</option><option value="0509_05">LUFWANYAMA</option><option value="0803_08">LUKULU</option><option value="0414_04">LUMEZI</option><option value="0404_04">LUNDAZI</option><option value="0209_02">LUNGA</option><option value="0110_01">LUNTE</option><option value="0112_01">LUPOSOSHI</option><option value="0904_09">LUSAKA</option><option value="0413_04">LUSANGAZI</option><option value="0104_01">LUWINGU</option><option value="1004_10">MAFINGA</option><option value="0405_04">MAMBWE</option><option value="0202_02">MANSA</option><option value="0609_06">MANYINGA</option><option value="0506_05">MASAITI</option><option value="0305_03">MAZABUKA</option><option value="0105_01">MBALA</option><option value="0206_02">MILENGE</option><option value="0813_08">MITETE</option><option value="0705_07">MKUSHI</option><option value="0804_08">MONGU</option><option value="0306_03">MONZE</option><option value="1005_10">MPIKA</option><option value="0510_05">MPONGWE</option><option value="0106_01">MPOROKOSO</option><option value="0107_01">MPULUNGU</option><option value="0507_05">MUFULIRA</option><option value="0604_06">MUFUMBWE</option><option value="0815_08">MULOBEZI</option><option value="0704_07">MUMBWA</option><option value="0108_01">MUNGWI</option><option value="0610_06">MUSHINDAMO</option><option value="0814_08">MWANDI</option><option value="0211_02">MWANSABOMBWE</option><option value="0203_02">MWENSE</option><option value="0605_06">MWINILUNGA</option><option value="1006_10">NAKONDE</option><option value="0811_08">NALOLO</option><option value="0307_03">NAMWALA</option><option value="0204_02">NCHELENGE</option><option value="0508_05">NDOLA</option><option value="0710_07">NGABWE</option><option value="0809_08">NKEYEMA</option><option value="0109_01">NSAMA</option><option value="0406_04">NYIMBA</option><option value="0312_03">PEMBA</option><option value="0407_04">PETAUKE</option><option value="0908_09">RUFUNSA</option><option value="0205_02">SAMFYA</option><option value="0805_08">SENANGA</option><option value="0111_01">SENGA HILL</option><option value="0706_07">SERENJE</option><option value="0806_08">SESHEKE             </option><option value="0807_08">SHANGOMBO</option><option value="0907_09">SHIBUYUNJI</option><option value="1007_10">SHIWANGANDU</option><option value="0308_03">SIAVONGA</option><option value="0816_08">SIKONGO</option><option value="0309_03">SINAZONGWE</option><option value="0409_04">SINDA</option><option value="0812_08">SIOMA</option><option value="0606_06">SOLWEZI</option><option value="0408_04">VUBWI</option><option value="0607_06">ZAMBEZI</option><option value="0313_03">ZIMBA</option> 
												
											</select>                      
							            </div>
										<div class="col-md-3 mb-3"><label class="fw-bold float-end"></div>
										<div class="col-md-9">
											<input type="submit" name="SaveApplicant" id="SaveApplicant" class="btn btn-secondary" value="Create">
									 		&nbsp;
									 		<input type="submit" name="CancelPushButton" value="Cancel" class="btn btn-warning" id="CancelPushButton">
									 	</div>
									</div>
								</div>
							</table>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>
	<script>
		var showpass = document.getElementById('showpass');
		
		function toggle(){
			var password = document.getElementById('Password1');
		    if(password.type == 'password') {
		        password.type = 'text';
		        showpass.innerHTML = '<i class="bi bi-eye-slash"></i>';
		    }else {
		        password.type = 'password';
		        showpass.innerHTML = '<i class="bi bi-eye"></i>';
		    }
		}

		var showpass2 = document.getElementById('showpass2');
		
		function toggle2(){
			var password = document.getElementById('Password2');
		    if(password.type == 'password') {
		        password.type = 'text';
		        showpass2.innerHTML = '<i class="bi bi-eye-slash"></i>';
		    }else {
		        password.type = 'password';
		        showpass2.innerHTML = '<i class="bi bi-eye"></i>';
		    }
		}
	</script>
	<?php include 'incs/footer.php';?>
</body>
</html>