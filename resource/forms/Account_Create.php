<?php use \Curator\Config\ACCOUNT\FIELD as FIELD; ?>
         <div class="row">
            <div class="col-md-3"></div>
            <div class="col-md-6">
               <div class="panel panel-primary">
                  <div class="panel-heading">
                     <h3 class="panel-title">Create Account</h3>
                  </div>
                  <div class="panel-body">
                       <form method="POST" action="<?=self::getActionURI();?>">
                          <fieldset>

                             <div class="row">
                                <div class="col-md-6">
                                   <div class="form-group">
                                      <div class="input-group">
                                         <span class="input-group-addon">
                                            <span class="glyphicon glyphicon-envelope" aria-hidden="true"></span>
                                         </span>
                                         <input name="Email" type="email" class="form-control" placeholder="Email" aria-describedby="basic-addon1" value="test@test.com">
                                      </div>
                                   </div>
                                </div>
        
                                <div class="col-md-6">
                                   <div class="form-group">
                                      <div class="input-group">
                                         <span class="input-group-addon">
                                            <span class="glyphicon glyphicon-repeat" aria-hidden="true"></span>
                                         </span>
                                         <input name="Email_Confirm" type="email" class="form-control" placeholder="Email (Confirm)" aria-describedby="basic-addon1" value="test@test.com">
                                      </div>
                                   </div>
                                </div>
                             </div>
        
                             <div class="row">
                                <div class="col-md-6">
                                   <div class="form-group">
                                      <div class="input-group">
                                         <span class="input-group-addon">
                                            <span class="glyphicon glyphicon-option-horizontal" aria-hidden="true"></span>
                                         </span>
                                         <input name="Password"  type="password" class="form-control" placeholder="Password" aria-describedby="basic-addon1" value="pass">
                                      </div>
                                   </div>
                                </div>
                                <div class="col-md-6">
                                   <div class="form-group">
                                      <div class="input-group">
                                         <span class="input-group-addon">
                                            <span class="glyphicon glyphicon-repeat" aria-hidden="true"></span>
                                         </span>
                                         <input name="Password_Confirm" type="password" class="form-control" placeholder="Password (Confirm)" aria-describedby="basic-addon1" value="pass">
                                      </div>
                                   </div>
                                </div>
                             </div>

                            <div class="row">
                                <?php if(FIELD\USERNAME) : ?>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <div class="input-group">
                                            <span class="input-group-addon">
                                                <span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>
                                            </span>
                                         <input name="Username" type="text" class="form-control" placeholder="Username" aria-describedby="basic-addon1" value="Vidarious">
                                      </div>
                                   </div>
                                </div>
                                <?php endif; ?>
        
                                <?php if(FIELD\GIVEN_NAME) : ?>
                                <div class="col-md-6">
                                   <div class="form-group">
                                      <div class="input-group">
                                         <span class="input-group-addon">
                                            <span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>
                                         </span>
                                         <input name="Given_Name" type="text" class="form-control" placeholder="Given Name" aria-describedby="basic-addon1" value="John">
                                      </div>
                                   </div>
                                </div>
                                <?php endif; ?>
                            </div>
        
                            <div class="row">
                                <?php if(FIELD\FAMILY_NAME) : ?>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <div class="input-group">
                                            <span class="input-group-addon">
                                                <span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>
                                            </span>
                                            <input name="Family_Name" type="text" class="form-control" placeholder="Family Name" aria-describedby="basic-addon1" value="Smith">
                                        </div>
                                    </div>
                                </div>
                                <?php endif; ?>
        
                                <?php if(FIELD\PREFERRED_NAME) : ?>
                                <div class="col-md-6">
                                   <div class="form-group">
                                      <div class="input-group">
                                         <span class="input-group-addon">
                                            <span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>
                                         </span>
                                         <input name="Preferred_Name" type="text" class="form-control" placeholder="Preferred Name" aria-describedby="basic-addon1" value="Kitten">
                                      </div>
                                   </div>
                                </div>
                                <?php endif; ?>
                             </div>
        
                             <div class="row">
                                <?php if(FIELD\TITLE) : ?>
                                <div class="col-md-6">
                                   <div class="form-group">
                                      <div class="input-group">
                                         <span class="input-group-addon">
                                            <span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>
                                         </span>
                                         <input name="Title" type="text" class="form-control" placeholder="Title" aria-describedby="basic-addon1" value="Mr.">
                                      </div>
                                   </div>
                                </div>
        
                                <?php endif; ?>
                                <?php if(FIELD\GENDER) : ?>
                                <div class="col-md-6">
                                   <div class="form-group">
                                      <div class="input-group">
                                         <span class="input-group-addon">
                                            <span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>
                                         </span>
                                         <input name="Gender" type="text" class="form-control" placeholder="Gender" aria-describedby="basic-addon1" value="Male">
                                      </div>
                                   </div>
                                </div>
                                <?php endif; ?>
                             </div>

                             <div class="row">
                                <?php if(FIELD\DATE_OF_BIRTH) : ?>
                                <div class="col-md-6">
                                   <div class="form-group">
                                      <div class="input-group">
                                         <span class="input-group-addon">
                                            <span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>
                                         </span>
                                         <input name="Date_Of_Birth" type="text" class="form-control" placeholder="Date of Birth" aria-describedby="basic-addon1" value="Jan 1, 1980">
                                      </div>
                                   </div>
                                </div>
                                <?php endif; ?>
                                <?php if(FIELD\PHONE) : ?>
                                <div class="col-md-6">
                                   <div class="form-group">
                                      <div class="input-group">
                                         <span class="input-group-addon">
                                            <span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>
                                         </span>
                                         <input name="Phone" type="text" class="form-control" placeholder="Phone Number" aria-describedby="basic-addon1" value="999-999-999">
                                      </div>
                                   </div>
                                </div>
                                <?php endif; ?>
                             </div>
        
                             <?php if(FIELD\ADDRESS) : ?>
                             <div class="row">
                                <div class="col-md-12">
                                   <div class="form-group">
                                      <div class="input-group">
                                         <span class="input-group-addon">
                                            <span class="glyphicon glyphicon-home" aria-hidden="true"></span>
                                         </span>
                                         <input name="Address_Label" type="text" class="form-control" placeholder="Label" aria-describedby="basic-addon1" value="Home">
                                      </div>
                                   </div>
                                </div>
                             </div>
        
                             <div class="row">
                                <div class="col-md-12">
                                   <div class="form-group">
                                      <div class="input-group">
                                         <span class="input-group-addon">
                                            <span class="glyphicon glyphicon-home" aria-hidden="true"></span>
                                         </span>
                                         <input name="Address_Line_1" type="text" class="form-control" placeholder="Line 1" aria-describedby="basic-addon1" value="123 Hotel Dr.">
                                      </div>
                                   </div>
                                </div>
                             </div>
        
                             <div class="row">
                                <div class="col-md-12">
                                   <div class="form-group">
                                      <div class="input-group">
                                         <span class="input-group-addon">
                                            <span class="glyphicon glyphicon-home" aria-hidden="true"></span>
                                         </span>
                                         <input name="Address_Line_2" type="text" class="form-control" placeholder="Line 2" aria-describedby="basic-addon1" value="">
                                      </div>
                                   </div>
                                </div>
                             </div>
        
                             <div class="row">
                                <div class="col-md-12">
                                   <div class="form-group">
                                      <div class="input-group">
                                         <span class="input-group-addon">
                                            <span class="glyphicon glyphicon-home" aria-hidden="true"></span>
                                         </span>
                                         <input name="Address_Line_3" type="text" class="form-control" placeholder="Line 3" aria-describedby="basic-addon1" value="">
                                      </div>
                                   </div>
                                </div>
                             </div>
        
                             <div class="row">
                                <div class="col-md-6">
                                   <div class="form-group">
                                      <div class="input-group">
                                         <span class="input-group-addon">
                                            <span class="glyphicon glyphicon-home" aria-hidden="true"></span>
                                         </span>
                                         <input name="Address_City" type="text" class="form-control" placeholder="City" aria-describedby="basic-addon1" value="Mississauga">
                                      </div>
                                   </div>
                                </div>
        
                                <div class="col-md-6">
                                   <div class="form-group">
                                      <div class="input-group">
                                         <span class="input-group-addon">
                                            <span class="glyphicon glyphicon-home" aria-hidden="true"></span>
                                         </span>
                                         <input name="Address_Province" type="text" class="form-control" placeholder="Province" aria-describedby="basic-addon1" value="Ontario">
                                      </div>
                                   </div>
                                </div>
                             </div>
        
                             <div class="row">
                                <div class="col-md-6">
                                   <div class="form-group">
                                      <div class="input-group">
                                         <span class="input-group-addon">
                                            <span class="glyphicon glyphicon-home" aria-hidden="true"></span>
                                         </span>
                                         <input name="Address_Postal" type="text" class="form-control" placeholder="Postal Code" aria-describedby="basic-addon1" value="K1J3V6">
                                      </div>
                                   </div>
                                </div>
        
                                <div class="col-md-6">
                                   <div class="form-group">
                                      <div class="input-group">
                                         <span class="input-group-addon">
                                            <span class="glyphicon glyphicon-home" aria-hidden="true"></span>
                                         </span>
                                         <input name="Address_Country" type="text" class="form-control" placeholder="Country" aria-describedby="basic-addon1" value="Canada">
                                      </div>
                                   </div>
                                </div>
                             </div>
                            <?php endif; ?>
        
                             <div class="row">
                                <div class="col-md-12">
                                   <input name="username" autocomplete="off" type="hidden" value="">
                                   <input name="cToken" autocomplete="off" type="hidden" value="<?=self::assignToken();?>">
                                   <button name="Form_Type" value ="Create_Account" type="submit" class="btn btn-info btn-block">OK</button>
                                </div>
                             </div>
                          </fieldset>
                       </form>
                  </div>
               </div>
            </div>
         </div>