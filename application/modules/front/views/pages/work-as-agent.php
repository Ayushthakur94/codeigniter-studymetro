<div class="main_container">

<section class="banner" <?php if($details['media'] == 0) echo"style='background-image:url(uploads/pages/".$details['media_file'].");'" ?>>
	<?php if($details['media'] == 1){ ?>
		<video controls autoplay muted loop id="bg_video">
          <source src="<?php echo base_url(); ?>uploads/pages/<?php echo $details['media_file']; ?>" type="video/mp4">
          <source src="<?php echo base_url(); ?>uploads/pages/<?php echo str_replace("mp4", "ogg", $details['media_file']); ?>" type="video/ogg"> Your browser does not support HTML5 video.
        </video>
	<?php } ?>
    <?php if($details['study_program'] == 0) { 
        echo getSeacrhStudyPrograms();
    } ?>
</section>

<section class="video_sec">
<div class="container">
    <div class="row">
        <div class="col-md-12 col-sm-12">
            <div class="about_content">
                <?php echo $details['content']; ?>
            </div>
            <div id="rootwizard">
                <div class="navbar hidden">
                    <div class="navbar-inner">
                    <ul>
                        <li><a href="#tab1" data-toggle="tab"><div class="round">Step - 1</div></a>
                         <div class="arrow"></div>
                        </li>
                        <li><a href="#tab2" data-toggle="tab"><div class="round">Step - 2</div></a>
                        <div class="arrow"></div>
                        </li>
                        <li><a href="#tab3" data-toggle="tab"><div class="round">Step - 3</div></a>
                        <div class="arrow"></div>
                        </li>
                        <li><a href="#tab4" data-toggle="tab"><div class="round">Step - 4</div></a>
                        <div class="arrow"></div>
                        </li>
                    </ul>
                    </div>
                </div>
                <div class="tab_box_content">
                    <div class="tab-content">
                        <div class="tab-pane" id="tab1">
                            <div class="form_head">
                                Company Details
                            </div>
                            <div class="form-group clearfix">
                                <label for="" class="col-sm-3 control-label">Business Name <span class="reuired-star">*</span></label>
                                <div class="col-sm-9">
                                    <input type="text" name="BusinessName" placeholder="Business Name" class="form-control">
                                </div>
                            </div>
                            <div class="form-group clearfix">
                                <label for="" class="col-sm-3 control-label">Address <span class="reuired-star">*</span></label>
                                <div class="col-sm-9">
                                    <input type="text" name="AddressLine1" placeholder="Address 1" class="form-control">
                                </div>
                            </div>
                            <div class="form-group clearfix">
                                <label for="" class="col-sm-3 control-label"></label>
                                <div class="col-sm-9">
                                    <input type="text" name="AddressLine2" placeholder="Address 2" class="form-control">
                                </div>
                            </div>
                            <div class="form-group clearfix">
                                <label for="" class="col-sm-3 control-label"></label>
                                <div class="col-sm-9">
                                    <input type="text" name="AddressLine3" placeholder="Address 3" class="form-control">
                                </div>
                            </div>
                            <div class="form-group clearfix">
                                <label for="" class="col-sm-3 control-label"></label>
                                <div class="col-sm-9">
                                    <input type="text" name="AddressLine4" placeholder="Address 4" class="form-control">
                                </div>
                            </div>
                            <div class="form-group clearfix">
                                <label for="" class="col-sm-3 control-label">Country  <span class="reuired-star">*</span></label>
                                <div class="col-sm-9">
                                    <select class="form-control" required name="Country">
                                        <option value="">Please Select</option>
                                        <?php foreach(getCountries() as $c) { ?>
                                            <option value="<?php echo $c['nicename']; ?>"><?php echo $c['nicename']; ?></option>
                                        <?php } ?>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group clearfix">
                                <label for="" class="col-sm-3 control-label">State <span class="reuired-star">*</span></label>
                                <div class="col-sm-9">
                                    <input type="text" name="State" placeholder="State" class="form-control">
                                </div>
                            </div>
                            <div class="form-group clearfix">
                                <label for="" class="col-sm-3 control-label">City <span class="reuired-star">*</span></label>
                                <div class="col-sm-9">
                                    <input type="text" name="City" placeholder="City" class="form-control">
                                </div>
                            </div>
                            <div class="form-group clearfix">
                                <label for="" class="col-sm-3 control-label">Postal Code</label>
                                <div class="col-sm-9">
                                    <input type="text" name="PostalCode" placeholder="Postal Code" class="form-control">
                                </div>
                            </div>
                            <div class="form-group clearfix">
                                <label for="" class="col-sm-3 control-label">Telephone <span class="reuired-star">*</span></label>
                                <div class="col-sm-9">
                                    <input type="text" name="Telephone" placeholder="Telephone" class="form-control">
                                </div>
                            </div>
                            <div class="form-group clearfix">
                                <label for="" class="col-sm-3 control-label">Fax </label>
                                <div class="col-sm-9">
                                    <input type="text" name="Fax" placeholder="Fax" class="form-control">
                                </div>
                            </div>
                            <div class="form-group clearfix">
                                <label for="" class="col-sm-3 control-label">Website</label>
                                <div class="col-sm-9">
                                    <input type="text" name="Website" placeholder="Website" class="form-control">
                                </div>
                            </div>
                            <div class="form_head">
                                Main Contact For All Correspondence
                            </div>
                            <div class="form-group clearfix">
                                <label for="" class="col-sm-3 control-label">Title  <span class="reuired-star">*</span></label>
                                <div class="col-sm-9">
                                    <select class="form-control" required name="MainContactTitle">
                                        <option value="">Please Select</option>
                                        <option value="Mr">Mr</option>
                                        <option value="Mrs">Mrs</option>
                                        <option value="Miss">Miss</option>
                                        <option value="Dr">Dr</option>
                                        <option value="Prof">Prof</option>
                                        <option value="Ms">Ms</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group clearfix">
                                <label for="" class="col-sm-3 control-label">First Name <span class="reuired-star">*</span></label>
                                <div class="col-sm-9">
                                    <input type="text" name="MainContactFirstname" placeholder="First Name" class="form-control">
                                </div>
                            </div>
                            <div class="form-group clearfix">
                                <label for="" class="col-sm-3 control-label">Family Name <span class="reuired-star">*</span></label>
                                <div class="col-sm-9">
                                    <input type="text" name="MainContactFamilyname" placeholder="Family Name" class="form-control">
                                </div>
                            </div>
                            <div class="form-group clearfix">
                                <label for="" class="col-sm-3 control-label">Position/Job Title <span class="reuired-star">*</span></label>
                                <div class="col-sm-9">
                                    <input type="text" name="MainContactFamilyname" placeholder="Position/Job Title" class="form-control">
                                </div>
                            </div>
                            <div class="form-group clearfix">
                                <label for="" class="col-sm-3 control-label">Email <span class="reuired-star">*</span></label>
                                <div class="col-sm-9">
                                    <input type="email" name="MainContactEmail" placeholder="Email" class="form-control">
                                </div>
                            </div>
                            <div class="form-group clearfix">
                                <label for="" class="col-sm-3 control-label">Direct Telephone <span class="reuired-star">*</span></label>
                                <div class="col-sm-9">
                                    <input type="text" name="MainContactDirectTelephone" placeholder="Direct Telephone" class="form-control">
                                </div>
                            </div>
                            <div class="form-group clearfix">
                                <label for="" class="col-sm-3 control-label">Mobile <span class="reuired-star">*</span></label>
                                <div class="col-sm-9">
                                    <input type="text" name="MainContactMobile" placeholder="Mobile" class="form-control">
                                </div>
                            </div>

                        </div>
                        <div class="tab-pane" id="tab2">
                           <div class="form_head">
                                Additional Contact Details
                            </div>
                            <div class="form-group clearfix">
                                <label for="" class="col-sm-3 control-label">Title </label>
                                <div class="col-sm-9">
                                    <input type="text" name="additionalContactTitle" placeholder="Title" class="form-control">
                                </div>
                            </div>
                            <div class="form-group clearfix">
                                <label for="" class="col-sm-3 control-label">First Name </label>
                                <div class="col-sm-9">
                                    <input type="text" name="additionalContactFirstName" placeholder="First Name" class="form-control">
                                </div>
                            </div>
                            <div class="form-group clearfix">
                                <label for="" class="col-sm-3 control-label">Family Name </label>
                                <div class="col-sm-9">
                                    <input type="text" name="additionalContactFamilyName" placeholder="Family Name" class="form-control">
                                </div>
                            </div>
                            <div class="form-group clearfix">
                                <label for="" class="col-sm-3 control-label">Position/Job Title </label>
                                <div class="col-sm-9">
                                    <input type="text" name="additionalContactJobTitle" placeholder="Position/Job Title" class="form-control">
                                </div>
                            </div>
                            <div class="form-group clearfix">
                                <label for="" class="col-sm-3 control-label">Email </label>
                                <div class="col-sm-9">
                                    <input type="email" name="additionalContactEmail" placeholder="Email" class="form-control">
                                </div>
                            </div>
                            <div class="form-group clearfix">
                                <label for="" class="col-sm-3 control-label">Direct Telephone </label>
                                <div class="col-sm-9">
                                    <input type="text" name="additionalContactTel" placeholder="Direct Telephone" class="form-control">
                                </div>
                            </div>
                            <div class="form-group clearfix">
                                <label for="" class="col-sm-3 control-label">Mobile </label>
                                <div class="col-sm-9">
                                    <input type="text" name="additionalContactMobile" placeholder="Mobile" class="form-control">
                                </div>
                            </div>
                            <div class="form_head">
                                Bank Details
                            </div>
                            <div class="form-group clearfix">
                                <label for="" class="col-sm-3 control-label">Bank Name  <span class="reuired-star">*</span></label>
                                <div class="col-sm-9">
                                    <input type="text" name="BankName" placeholder="Bank Name" class="form-control">
                                </div>
                            </div>
                            <div class="form-group clearfix">
                                <label for="" class="col-sm-3 control-label">Branch Name  <span class="reuired-star">*</span></label>
                                <div class="col-sm-9">
                                    <input type="text" name="BankBranchName" placeholder="Branch Name" class="form-control">
                                </div>
                            </div>
                            <div class="form-group clearfix">
                                <label for="" class="col-sm-3 control-label">Address  <span class="reuired-star">*</span></label>
                                <div class="col-sm-9">
                                    <input type="text" name="BankAddresss" placeholder="Address" class="form-control">
                                </div>
                            </div>
                            <div class="form-group clearfix">
                                <label for="" class="col-sm-3 control-label">City  <span class="reuired-star">*</span></label>
                                <div class="col-sm-9">
                                    <input type="text" name="BankCity" placeholder="City" class="form-control">
                                </div>
                            </div>
                            <div class="form-group clearfix">
                                <label for="" class="col-sm-3 control-label">Postal Code </label>
                                <div class="col-sm-9">
                                    <input type="text" name="BankPostcode" placeholder="Postal Code" class="form-control">
                                </div>
                            </div>
                            <div class="form-group clearfix">
                                <label for="" class="col-sm-3 control-label">Country  <span class="reuired-star">*</span></label>
                                <div class="col-sm-9">
                                    <select class="form-control" required name="BankCountry">
                                        <option value="">Please Select</option>
                                        <?php foreach(getCountries() as $c) { ?>
                                            <option value="<?php echo $c['nicename']; ?>"><?php echo $c['nicename']; ?></option>
                                        <?php } ?>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group clearfix">
                                <label for="" class="col-sm-3 control-label">Account Name </label>
                                <div class="col-sm-9">
                                    <input type="text" name="AccountName" placeholder="Account Name" class="form-control">
                                </div>
                            </div>
                            <div class="form-group clearfix">
                                <label for="" class="col-sm-3 control-label">Account Number </label>
                                <div class="col-sm-9">
                                    <input type="text" name="AccountNumber" placeholder="Account Number" class="form-control">
                                </div>
                            </div>
                            <div class="form-group clearfix">
                                <label for="" class="col-sm-3 control-label">Sort Code / BIC / IBAN / SWIFT </label>
                                <div class="col-sm-9">
                                    <input type="text" name="SortCode" placeholder="Sort Code / BIC / IBAN / SWIFT" class="form-control">
                                </div>
                            </div>
                            <div class="form-group clearfix">
                                <label for="" class="col-sm-3 control-label">Payment Currency  <span class="reuired-star">*</span></label>
                                <div class="col-sm-9">
                                    <select class="form-control" required name="PaymentCurrency">
                                        <option value="">Please Select</option>
                                            <option value="Afghani">Afghani</option>
                                            <option value="Algerian Dinar">Algerian Dinar</option>
                                            <option value="Argentine Peso">Argentine Peso</option>
                                            <option value="Armenian Dram">Armenian Dram</option>
                                            <option value="Aruban Florin">Aruban Florin</option>
                                            <option value="Australian Dollars">Australian Dollars</option>
                                            <option value="Azerbaijanian Manat">Azerbaijanian Manat</option>
                                            <option value="Bahamian Dollar">Bahamian Dollar</option>
                                            <option value="Bahraini Dinar">Bahraini Dinar</option>
                                            <option value="Baht">Baht</option>
                                            <option value="Balboa">Balboa</option>
                                            <option value="Barbados Dollar">Barbados Dollar</option>
                                            <option value="Belarussian Ruble">Belarussian Ruble</option>
                                            <option value="Belize Dollar">Belize Dollar</option>
                                            <option value="Bermudian Dollar">Bermudian Dollar</option>
                                            <option value="Bolivar">Bolivar</option>
                                            <option value="Boliviano">Boliviano</option>
                                            <option value="Brazilian Real">Brazilian Real</option>
                                            <option value="Brunei Dollar">Brunei Dollar</option>
                                            <option value="Bulgarian Lev">Bulgarian Lev</option>
                                            <option value="Burundi Franc">Burundi Franc</option>
                                            <option value="Cabo Verde Escudo">Cabo Verde Escudo</option>
                                            <option value="Canadian dollar">Canadian dollar</option>
                                            <option value="Cayman Islands Dollar">Cayman Islands Dollar</option>
                                            <option value="CFA Franc BCEAO">CFA Franc BCEAO</option>
                                            <option value="CFA Franc BEAC">CFA Franc BEAC</option>
                                            <option value="CFP Franc">CFP Franc</option>
                                            <option value="Chilean Peso">Chilean Peso</option>
                                            <option value="Colombian Peso">Colombian Peso</option>
                                            <option value="Comoro Franc">Comoro Franc</option>
                                            <option value="Congolese Franc">Congolese Franc</option>
                                            <option value="Convertible Mark">Convertible Mark</option>
                                            <option value="Cordoba Oro">Cordoba Oro</option>
                                            <option value="Costa Rican Colon">Costa Rican Colon</option>
                                            <option value="Croatian Kuna">Croatian Kuna</option>
                                            <option value="Cuban Peso">Cuban Peso</option>
                                            <option value="Czech Koruna">Czech Koruna</option>
                                            <option value="Dalasi">Dalasi</option>
                                            <option value="Danish Krone">Danish Krone</option>
                                            <option value="Denar">Denar</option>
                                            <option value="Djibouti Franc">Djibouti Franc</option>
                                            <option value="Dobra">Dobra</option>
                                            <option value="Dominican Peso">Dominican Peso</option>
                                            <option value="Dong">Dong</option>
                                            <option value="East Caribbean Dollar">East Caribbean Dollar</option>
                                            <option value="Egyptian Pound">Egyptian Pound</option>
                                            <option value="El Salvador Colon">El Salvador Colon</option>
                                            <option value="Ethiopian Birr">Ethiopian Birr</option>
                                            <option value="Euros">Euros</option>
                                            <option value="Falkland Islands Pound">Falkland Islands Pound</option>
                                            <option value="Fiji Dollar">Fiji Dollar</option>
                                            <option value="Forint">Forint</option>
                                            <option value="GB Pounds">GB Pounds</option>
                                            <option value="Ghana Cedi">Ghana Cedi</option>
                                            <option value="Gibraltar Pound">Gibraltar Pound</option>
                                            <option value="Gourde">Gourde</option>
                                            <option value="Guarani">Guarani</option>
                                            <option value="Guinea Franc">Guinea Franc</option>
                                            <option value="Guyana Dollar">Guyana Dollar</option>
                                            <option value="Hong Kong Dollar">Hong Kong Dollar</option>
                                            <option value="Hryvnia">Hryvnia</option>
                                            <option value="Iceland Krona">Iceland Krona</option>
                                            <option value="Iranian Rial">Iranian Rial</option>
                                            <option value="Iraqi Dinar">Iraqi Dinar</option>
                                            <option value="Jamaican Dollar">Jamaican Dollar</option>
                                            <option value="Jordanian Dinar">Jordanian Dinar</option>
                                            <option value="Kenyan Shilling">Kenyan Shilling</option>
                                            <option value="Kina">Kina</option>
                                            <option value="Kip">Kip</option>
                                            <option value="Kuwaiti Dinar">Kuwaiti Dinar</option>
                                            <option value="Kwacha">Kwacha</option>
                                            <option value="Kwanza">Kwanza</option>
                                            <option value="Kyat">Kyat</option>
                                            <option value="Lari">Lari</option>
                                            <option value="Lebanese Pound">Lebanese Pound</option>
                                            <option value="Lek">Lek</option>
                                            <option value="Lempira">Lempira</option>
                                            <option value="Leone">Leone</option>
                                            <option value="Liberian Dollar">Liberian Dollar</option>
                                            <option value="Libyan Dinar">Libyan Dinar</option>
                                            <option value="Lilangeni">Lilangeni</option>
                                            <option value="Lithuanian Litas">Lithuanian Litas</option>
                                            <option value="Loti">Loti</option>
                                            <option value="Malagasy Ariary">Malagasy Ariary</option>
                                            <option value="Malaysian Ringgit">Malaysian Ringgit</option>
                                            <option value="Mauritius Rupee">Mauritius Rupee</option>
                                            <option value="Mexican Peso">Mexican Peso</option>
                                            <option value="Moldovan Leu">Moldovan Leu</option>
                                            <option value="Moroccan Dirham">Moroccan Dirham</option>
                                            <option value="Mozambique Metical">Mozambique Metical</option>
                                            <option value="Naira">Naira</option>
                                            <option value="Nakfa">Nakfa</option>
                                            <option value="Namibia Dollar">Namibia Dollar</option>
                                            <option value="Nepalese Rupee">Nepalese Rupee</option>
                                            <option value="Netherlands Antillean Guilder">Netherlands Antillean Guilder</option>
                                            <option value="New Israeli Sheqel">New Israeli Sheqel</option>
                                            <option value="New Romanian Leu">New Romanian Leu</option>
                                            <option value="New Taiwan Dollar">New Taiwan Dollar</option>
                                            <option value="New Zealand Dollars">New Zealand Dollars</option>
                                            <option value="Ngultrum">Ngultrum</option>
                                            <option value="North Korean Won">North Korean Won</option>
                                            <option value="Norwegian Krone">Norwegian Krone</option>
                                            <option value="Nuevo Sol">Nuevo Sol</option>
                                            <option value="Ouguiya">Ouguiya</option>
                                            <option value="Pa’anga">Pa’anga</option>
                                            <option value="Pakistan Rupee">Pakistan Rupee</option>
                                            <option value="Pataca">Pataca</option>
                                            <option value="Peso Convertible">Peso Convertible</option>
                                            <option value="Peso Uruguayo">Peso Uruguayo</option>
                                            <option value="Philippine Peso">Philippine Peso</option>
                                            <option value="Pula">Pula</option>
                                            <option value="Qatari Rial">Qatari Rial</option>
                                            <option value="Quetzal">Quetzal</option>
                                            <option value="Rand">Rand</option>
                                            <option value="Rial Omani">Rial Omani</option>
                                            <option value="Riel">Riel</option>
                                            <option value="Rufiyaa">Rufiyaa</option>
                                            <option value="Rupiah">Rupiah</option>
                                            <option value="Russian Ruble">Russian Ruble</option>
                                            <option value="Rwanda Franc">Rwanda Franc</option>
                                            <option value="Saint Helena Pound">Saint Helena Pound</option>
                                            <option value="Saudi Riyal">Saudi Riyal</option>
                                            <option value="Serbian Dinar">Serbian Dinar</option>
                                            <option value="Seychelles Rupee">Seychelles Rupee</option>
                                            <option value="Singapore Dollar">Singapore Dollar</option>
                                            <option value="Solomon Islands Dollar">Solomon Islands Dollar</option>
                                            <option value="Som">Som</option>
                                            <option value="Somali Shilling">Somali Shilling</option>
                                            <option value="Somoni">Somoni</option>
                                            <option value="South Sudanese Pound">South Sudanese Pound</option>
                                            <option value="Sri Lanka Rupee">Sri Lanka Rupee</option>
                                            <option value="Sudanese Pound">Sudanese Pound</option>
                                            <option value="Surinam Dollar">Surinam Dollar</option>
                                            <option value="Swedish Krona">Swedish Krona</option>
                                            <option value="Swiss Franc">Swiss Franc</option>
                                            <option value="Syrian Pound">Syrian Pound</option>
                                            <option value="Taka">Taka</option>
                                            <option value="Tala">Tala</option>
                                            <option value="Tanzanian Shilling">Tanzanian Shilling</option>
                                            <option value="Tenge">Tenge</option>
                                            <option value="Trinidad and Tobago Dollar">Trinidad and Tobago Dollar</option>
                                            <option value="Tugrik">Tugrik</option>
                                            <option value="Tunisian Dinar">Tunisian Dinar</option>
                                            <option value="Turkish Lira">Turkish Lira</option>
                                            <option value="Turkmenistan New Manat">Turkmenistan New Manat</option>
                                            <option value="UAE Dirham">UAE Dirham</option>
                                            <option value="Uganda Shilling">Uganda Shilling</option>
                                            <option value="US Dollars">US Dollars</option>
                                            <option value="Uzbekistan Sum">Uzbekistan Sum</option>
                                            <option value="Vatu">Vatu</option>
                                            <option value="Won">Won</option>
                                            <option value="Yemeni Rial">Yemeni Rial</option>
                                            <option value="Yen">Yen</option>
                                            <option value="Yuan Renminbi">Yuan Renminbi</option>
                                            <option value="Zambian Kwacha">Zambian Kwacha</option>
                                            <option value="Zimbabwe Dollar">Zimbabwe Dollar</option>
                                            <option value="Zloty">Zloty</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group clearfix">
                                <label for="" class="col-sm-3 control-label">Payment Method  <span class="reuired-star">*</span></label>
                                <div class="col-sm-9">
                                    <select class="form-control" required name="PaymentMethod">
                                        <option value="">Please Select</option>
                                        <option value="BACS/CHAPS">BACS/CHAPS</option>
                                        <option value="Cheque">Cheque</option>
                                        <option value="International Bank Draft">International Bank Draft</option>
                                        <option value="International Bank Transfer">International Bank Transfer</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane" id="tab3">
                            <div class="form_head">
                                Company Overview
                            </div>
                            <div class="form_content">
                                <div class="form-group clearfix">
                                    <label for="" class="col-sm-3 control-label">What year did your business start operating? <span class="reuired-star">*</span></label>
                                    <div class="col-sm-9">
                                        <select class="form-control" required name="YearStartedOperating">
                                            <option value="">Select Year</option>
                                        <?php for ($i= date('Y'); $i > 1917; $i--) { ?>
                                            <option value="<?php echo $i; ?>" <?php if($i == date('Y')) echo "selected"; ?>><?php echo $i; ?></option>
                                        <?php } ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group clearfix">
                                    <label for="" class="col-sm-3 control-label">How many students did you send abroad last year?  <span class="reuired-star">*</span></label>
                                    <div class="col-sm-9">
                                        <select class="form-control" required name="NumberOfStudents">
                                            <option value="">Please Select</option>
                                            <option value="0">0</option>
                                            <option value="1-50">1-50</option>
                                            <option value="51-200" selected>51-200</option>
                                            <option value="201+">201+</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group clearfix hidden">
                                    <label for="" class="col-sm-3 control-label">Into which Division of Study Group will you be enrolling most students?  <span class="reuired-star">*</span></label>
                                    <div class="col-sm-9">
                                        <div class="radio">
                                          <label><input type="radio" value="HE" name="StudyGroupDivision" checked>Higher Education – including Bellerbys College, Taylors College, International Study Centres in the UK, North America and Australia</label>
                                        </div>
                                        <div class="radio">
                                          <label><input type="radio" value="LE" name="StudyGroupDivision" >Language Education – Embassy English, Embassy Summer, Embassy Academy, Embassy Study Tours</label>
                                        </div>
                                        <div class="radio">
                                          <label><input type="radio" value="CE" name="StudyGroupDivision" >Career Education – ACPE, AIAS, Martin College</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group clearfix">
                                    <label for="" class="col-sm-3 control-label">Which countries are the most popular destinations? Please list these countries starting with the most popular and finishing with the least popular.  <span class="reuired-star">*</span></label>
                                    <div class="col-sm-9">
                                        <select class="form-control popular-countries" required name="MostPopularCountry1">
                                            <option value="">Please Select</option>
                                            <?php foreach(countries() as $c) { ?>
                                                <option value="<?php echo $c; ?>"><?php echo $c; ?></option>
                                            <?php } ?>
                                        </select>
                                        <select class="form-control popular-countries" required name="MostPopularCountry2">
                                            <option value="">Please Select</option>
                                            <?php foreach(countries() as $c) { ?>
                                                <option value="<?php echo $c; ?>"><?php echo $c; ?></option>
                                            <?php } ?>
                                        </select>
                                        <select class="form-control popular-countries" required name="MostPopularCountry3">
                                            <option value="">Please Select</option>
                                            <?php foreach(countries() as $c) { ?>
                                                <option value="<?php echo $c; ?>"><?php echo $c; ?></option>
                                            <?php } ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group clearfix">
                                    <label for="" class="col-sm-3 control-label">Is your business licensed by the government of your country? <span class="reuired-star">*</span></label>
                                    <div class="col-sm-9">
                                        <div class="radio">
                                          <label><input type="radio" value="Yes" name="IsLicensedByGovernment" checked>Yes</label>&nbsp;
                                          <label><input type="radio" value="No" name="IsLicensedByGovernment">No</label>&nbsp;
                                          <label><input type="radio" value="Not required" name="IsLicensedByGovernment">Not required in our country</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group clearfix">
                                    <label for="" class="col-sm-3 control-label">Business registration number? </label>
                                    <div class="col-sm-9">
                                        <input type="text" name="BusinessRegistrationNumber" placeholder="Business registration number" class="form-control">
                                    </div>
                                </div>
                                <div class="form-group clearfix">
                                    <label for="" class="col-sm-3 control-label">What other companies or institutions do you represent? </label>
                                    <div class="col-sm-9">
                                    <textarea placeholder="What other companies or institutions do you represent" rows="4" class="form-control" name="OtherCompaniesOrInstitutions"></textarea>
                                    </div>
                                </div>
                                <div class="form_head">
                                    Company Operations
                                </div>
                                <div class="form-group clearfix">
                                    <label for="" class="col-sm-3 control-label">How many counsellors do you employ?  <span class="reuired-star">*</span></label>
                                    <div class="col-sm-9">
                                        <select class="form-control" required name="howManyCounsellors">
                                            <option value="">Please Select</option>
                                            <option value="1">1</option>
                                            <option value="2-5">2-5</option>
                                            <option value="5+">5+</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group clearfix">
                                    <label for="" class="col-sm-3 control-label">On average how many years of relevant experience do your counsellors have?  <span class="reuired-star">*</span></label>
                                    <div class="col-sm-9">
                                        <select class="form-control" required name="yearsOfExperience">
                                            <option value="">Please Select</option>
                                            <option value="1">1 Year</option>
                                            <option value="2-5">2-5 Years</option>
                                            <option value="5+">5+ Years</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group clearfix">
                                    <label for="" class="col-sm-3 control-label">Which media do you currently use for advertising? </label>
                                    <div class="col-sm-9">
                                        <div class="checkbox">
                                          <label><input type="checkbox" name="UseInternetAdvertising" value="Internet">Internet</label>
                                        </div>
                                        <div class="checkbox">
                                          <label><input type="checkbox" name="UseInternetAdvertising" value="TV/radio">TV/radio</label>
                                        </div>
                                        <div class="checkbox">
                                          <label><input type="checkbox" name="UseInternetAdvertising" value="International Publications">International Publications</label>
                                        </div>
                                        <div class="checkbox">
                                          <label><input type="checkbox" name="UseInternetAdvertising" value="National Publications">National Publications</label>
                                        </div>
                                        <div class="checkbox">
                                          <label><input type="checkbox" name="UseInternetAdvertising" value="Local Publications">Local Publications</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group clearfix">
                                    <label for="" class="col-sm-3 control-label">Do you produce your own brochures? <span class="reuired-star">*</span></label>
                                    <div class="col-sm-9">
                                        <div class="radio">
                                          <label><input type="radio" value="Yes" name="DoYouProvideBrochures" checked>Yes</label>&nbsp;
                                          <label><input type="radio" value="No" name="DoYouProvideBrochures">No</label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane" id="tab4">
                            <div class="form_head">
                                Additional Information
                            </div>
                            <div class="form-group clearfix">
                                <label for="" class="col-sm-3 control-label">How did you hear about Study Metro?  <span class="reuired-star">*</span></label>
                                <div class="col-sm-9">
                                    <select class="form-control" required name="HowDidYouHearAboutUs">
                                        <option value="">Please Select</option>
                                        <option value="Advertisement">Advertisement</option>
                                        <option value="Brochure">Brochure</option>
                                        <option value="Website">Website</option>
                                        <option value="Exhibition">Exhibition</option>
                                        <option value="Personal Recommendation">Personal Recommendation</option>
                                        <option value="Other">Other</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group clearfix hidden">
                                <label for="" class="col-sm-3 control-label">Our expectation is that your service will include providing advice about visa requirements and study options, assistance with visa processing and travel arrangements and liaison with Study Group regarding airport reception and student accommodation. <br/> <br/>  Please tell us how you deal with the visa process and whether you hold any qualifications in that area. </label>
                                <div class="col-sm-9">
                                <textarea placeholder="Please tell us how you deal with the visa process and whether you hold any qualifications in that area." rows="12" class="form-control" name="OtherComments"></textarea>
                                </div>
                            </div>
                            <div class="form_head">
                                First Referee
                            </div>
                            <div class="form-group clearfix">
                                <label for="" class="col-sm-3 control-label">Name of referee <span class="reuired-star">*</span></label>
                                <div class="col-sm-9">
                                    <input type="text" name="FirstRefereeName" placeholder="Name of referee" class="form-control">
                                </div>
                            </div>
                            <div class="form-group clearfix">
                                <label for="" class="col-sm-3 control-label">Company of referee <span class="reuired-star">*</span></label>
                                <div class="col-sm-9">
                                    <input type="text" name="FirstRefereeCompany" placeholder="Company of referee" class="form-control">
                                </div>
                            </div>
                            <div class="form-group clearfix">
                                <label for="" class="col-sm-3 control-label">Referee Country  <span class="reuired-star">*</span></label>
                                <div class="col-sm-9">
                                    <select class="form-control" required name="FirstRefereeCountry">
                                        <option value="">Please Select</option>
                                        <?php foreach(getCountries() as $c) { ?>
                                            <option value="<?php echo $c['nicename']; ?>"><?php echo $c['nicename']; ?></option>
                                        <?php } ?>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group clearfix">
                                <label for="" class="col-sm-3 control-label">Email of referee <span class="reuired-star">*</span></label>
                                <div class="col-sm-9">
                                    <input type="email" name="FirstRefereeEmail" placeholder="Email of referee" class="form-control">
                                </div>
                            </div>
                            <div class="form-group clearfix">
                                <label for="" class="col-sm-3 control-label">Telephone of referee <span class="reuired-star">*</span></label>
                                <div class="col-sm-9">
                                    <input type="text" name="FirstRefereeTelephone" placeholder="Telephone of referee" class="form-control">
                                </div>
                            </div>
                            <div class="form_head">
                                Second Referee
                            </div>
                            <div class="form-group clearfix">
                                <label for="" class="col-sm-3 control-label">Name of referee <span class="reuired-star">*</span></label>
                                <div class="col-sm-9">
                                    <input type="text" name="SecondRefereeName" placeholder="Name of referee" class="form-control">
                                </div>
                            </div>
                            <div class="form-group clearfix">
                                <label for="" class="col-sm-3 control-label">Company of referee <span class="reuired-star">*</span></label>
                                <div class="col-sm-9">
                                    <input type="text" name="SecondRefereeCompany" placeholder="Company of referee" class="form-control">
                                </div>
                            </div>
                            <div class="form-group clearfix">
                                <label for="" class="col-sm-3 control-label">Referee Country  <span class="reuired-star">*</span></label>
                                <div class="col-sm-9">
                                    <select class="form-control" required name="SecondRefereeCountry">
                                        <option value="">Please Select</option>
                                        <?php foreach(getCountries() as $c) { ?>
                                            <option value="<?php echo $c['nicename']; ?>"><?php echo $c['nicename']; ?></option>
                                        <?php } ?>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group clearfix">
                                <label for="" class="col-sm-3 control-label">Email of referee <span class="reuired-star">*</span></label>
                                <div class="col-sm-9">
                                    <input type="email" name="SecondRefereeEmail" placeholder="Email of referee" class="form-control">
                                </div>
                            </div>
                            <div class="form-group clearfix">
                                <label for="" class="col-sm-3 control-label">Telephone of referee <span class="reuired-star">*</span></label>
                                <div class="col-sm-9">
                                    <input type="text" name="SecondRefereeTelephone" placeholder="Telephone of referee" class="form-control">
                                </div>
                            </div>
                        </div>
                        <ul class="pager wizard">
                            <li class="previous first" style="display:none;"><a href="javascript:void(0);">First</a></li>
                            <li class="previous"><a href="javascript:void(0);"><i class="fa fa-caret-left"></i> Previous </a></li>

                            <li class="next last" style="display:none;"><a href="javascript:void(0);">Last</a></li>
                            <li class="next"><a href="javascript:void(0);">proceed <i class="fa fa-caret-right"></i> </a></li>

                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</section>

<?php if($details['is_services'] == 0) { 
    echo getOurServices();
} ?>

<?php if($details['photo_gallery'] == 0) { 
    echo getPhotosGallery();
} ?>

<?php if($details['scholar_form'] == 0) { 
    echo getScholarshipForm();
} ?>

<?php if($details['is_testimonails'] == 0) { 
    echo getTestimonails();
} ?>

<?php if($details['video_gallery'] == 0) { 
    echo getVideoGallerySection();
} ?>

</div>

<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/jquery.bootstrap.wizard.min.js"></script>
<script type="text/javascript">
  jQuery(document).ready(function() {
    $('#rootwizard').bootstrapWizard();
  });
</script>


