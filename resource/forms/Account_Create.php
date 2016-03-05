<?php use \Curator\Config\ACCOUNT\FIELD as FIELD; ?>
         <div class="row">
            <div class="col-md-3"></div>
            <div class="col-md-6">
               <div class="panel panel-primary">
                  <div class="panel-heading">
                     <h3 class="panel-title">Create Account</h3>
                  </div>
                  <?php dump($this); ?>
                  <div class="panel-body">
                       <form method="POST" action="<?=$this->Form->getActionURI();?>">
                          <fieldset>
                            <?php if(!empty($this->Form->formMessagesSuccess)) : ?>
                                <?php foreach($this->Form->formMessagesSuccess as $message) : ?>
                            <div class="alert alert-success" role="alert"><?=$message?></div>
                                <?php endforeach; ?>
                            <?php endif; ?>
                            <?php if(!empty($this->Form->formMessagesError)) : ?>
                                <?php foreach(array_reverse($this->Form->formMessagesError) as $message) : ?>
                            <div class="alert alert-danger" role="alert"><?=$message?></div>
                                <?php endforeach; ?>
                            <?php endif; ?>

                            <?php if(!$this->success) : ?>

                             <div class="row">
                                <div class="col-md-6">
                                   <div class="form-group<?php if(!empty($this->Policy->Email['Message'])) : ?> has-error has-feedback<?php endif; ?>">
                                      <div class="input-group">
                                         <span class="input-group-addon">
                                            <span class="glyphicon glyphicon-envelope" aria-hidden="true"></span>
                                         </span>
                                         <input name="Email" type="text" class="form-control" placeholder="Email" aria-describedby="user-email" value="<?php if(!empty($this->Policy->Email['Value'])) { echo $this->Policy->Email['Value']; } ?>" data-toggle="tooltip" title="<?php if(!empty($this->Policy->Email['Message'])) { echo $this->Policy->Email['Message']; } ?>">
                                         <?php if(!empty($this->Policy->Email['Message'])) : ?>
                                         <span class="glyphicon glyphicon-remove form-control-feedback" aria-hidden="true"></span>
                                         <span class="sr-only"><?=$this->Policy->Email['Message']?></span>
                                         <?php endif; ?>
                                      </div>
                                   </div>
                                </div>
        
                                <div class="col-md-6">
                                   <div class="form-group<?php if(!empty($this->Policy->Email_Confirm['Message'])) : ?> has-error has-feedback<?php endif; ?>">
                                      <div class="input-group">
                                         <span class="input-group-addon">
                                            <span class="glyphicon glyphicon-repeat" aria-hidden="true"></span>
                                         </span>
                                         <input name="Email_Confirm" type="text" class="form-control" placeholder="Email (Confirm)" aria-describedby="user-email-confirm" value="<?php if(!empty($this->Policy->Email_Confirm['Value'])) { echo $this->Policy->Email_Confirm['Value']; } ?>" data-toggle="tooltip" title="<?php if(!empty($this->Policy->Email_Confirm['Message'])) { echo $this->Policy->Email_Confirm['Message']; } ?>">
                                         <?php if(!empty($this->Policy->Email_Confirm['Message'])) : ?>
                                         <span class="glyphicon glyphicon-remove form-control-feedback" aria-hidden="true"></span>
                                         <span class="sr-only"><?=$this->Policy->Email_Confirm['Message']?></span>
                                         <?php endif; ?>
                                      </div>
                                   </div>
                                </div>
                             </div>
        
                             <div class="row">
                                <div class="col-md-6">
                                   <div class="form-group<?php if(!empty($this->Policy->Password['Message'])) : ?> has-error has-feedback<?php endif; ?>">
                                      <div class="input-group">
                                         <span class="input-group-addon">
                                            <span class="glyphicon glyphicon-option-horizontal" aria-hidden="true"></span>
                                         </span>
                                         <input name="Password"  type="password" class="form-control" placeholder="Password" aria-describedby="user-password" value="<?php if(!empty($this->Policy->Password['Value'])) { echo $this->Policy->Password['Value']; } ?>" data-toggle="tooltip" title="<?php if(!empty($this->Policy->Password['Message'])) { echo $this->Policy->Password['Message']; } ?>">
                                         <?php if(!empty($this->Policy->Password['Message'])) : ?>
                                         <span class="glyphicon glyphicon-remove form-control-feedback" aria-hidden="true"></span>
                                         <span class="sr-only"><?=$this->Policy->Password['Message']?></span>
                                         <?php endif; ?>
                                      </div>
                                   </div>
                                </div>
                                <div class="col-md-6">
                                   <div class="form-group<?php if(!empty($this->Policy->Password_Confirm['Message'])) : ?> has-error has-feedback<?php endif; ?>">
                                      <div class="input-group">
                                         <span class="input-group-addon">
                                            <span class="glyphicon glyphicon-repeat" aria-hidden="true"></span>
                                         </span>
                                         <input name="Password_Confirm" type="password" class="form-control" placeholder="Password (Confirm)" aria-describedby="user-password-confirm" value="<?php if(!empty($this->Policy->Password_Confirm['Value'])) { echo $this->Policy->Password_Confirm['Value']; } ?>" data-toggle="tooltip" title="<?php if(!empty($this->Policy->Password_Confirm['Message'])) { echo $this->Policy->Password_Confirm['Message']; } ?>">
                                         <?php if(!empty($this->Policy->Password_Confirm['Message'])) : ?>
                                         <span class="glyphicon glyphicon-remove form-control-feedback" aria-hidden="true"></span>
                                         <span class="sr-only"><?=$this->Policy->Password_Confirm['Message']?></span>
                                         <?php endif; ?>
                                      </div>
                                   </div>
                                </div>
                             </div>

                            <div class="row">
                                <?php if(FIELD\USERNAME) : ?>
                                <div class="col-md-6">
                                    <div class="form-group <?php if(!empty($this->Policy->Username['Message'])) : ?> has-error has-feedback<?php endif; ?>">
                                        <div class="input-group">
                                            <span class="input-group-addon">
                                                <span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>
                                            </span>
                                         <input name="Username" type="text" class="form-control" placeholder="Username" aria-describedby="user-username" value="<?php if(!empty($this->Policy->Username['Value'])) { echo $this->Policy->Username['Value']; } ?>" data-toggle="tooltip" title="<?php if(!empty($this->Policy->Username['Message'])) { echo $this->Policy->Username['Message']; } ?>">
                                         <?php if(!empty($this->Policy->Username['Message'])) : ?>
                                         <span class="glyphicon glyphicon-remove form-control-feedback" aria-hidden="true"></span>
                                         <span class="sr-only"><?=$this->Policy->Username['Message']?></span>
                                         <?php endif; ?>
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
                                         <input name="Given_Name" type="text" class="form-control" placeholder="Given Name" aria-describedby="user-given-name" value="John">
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
                                            <input name="Family_Name" type="text" class="form-control" placeholder="Family Name" aria-describedby="user-family-name" value="Smith">
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
                                         <input name="Preferred_Name" type="text" class="form-control" placeholder="Preferred Name" aria-describedby="user-preferred-name" value="Kitten">
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
                                         <input name="Title" type="text" class="form-control" placeholder="Title" aria-describedby="user-title" value="Mr.">
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
                                         <input name="Gender" type="text" class="form-control" placeholder="Gender" aria-describedby="user-gender" value="Male">
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
                                         <input name="Date_Of_Birth" type="text" class="form-control" placeholder="Date of Birth" aria-describedby="user-date-of-birth" value="Jan 1, 1980">
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
                                         <input name="Phone" type="text" class="form-control" placeholder="Phone Number" aria-describedby="user-phone-number" value="999-999-999">
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
                                         <input name="Address_Label" type="text" class="form-control" placeholder="Label" aria-describedby="user-address-label" value="Home">
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
                                         <input name="Address_Line_1" type="text" class="form-control" placeholder="Line 1" aria-describedby="user-address-line1" value="123 Hotel Dr.">
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
                                         <input name="Address_Line_2" type="text" class="form-control" placeholder="Line 2" aria-describedby="user-address-line2" value="">
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
                                         <input name="Address_Line_3" type="text" class="form-control" placeholder="Line 3" aria-describedby="user-address-line2" value="">
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
                                         <input name="Address_City" type="text" class="form-control" placeholder="City" aria-describedby="user-address-line3" value="Mississauga">
                                      </div>
                                   </div>
                                </div>
        
                                <div class="col-md-6">
                                   <div class="form-group">
                                      <div class="input-group">
                                         <span class="input-group-addon">
                                            <span class="glyphicon glyphicon-home" aria-hidden="true"></span>
                                         </span>
                                         <input name="Address_Province" type="text" class="form-control" placeholder="Province" aria-describedby="user-address-province" value="Ontario">
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
                                         <input name="Address_Postal" type="text" class="form-control" placeholder="Postal Code" aria-describedby="user-address-postal" value="K1J3V6">
                                      </div>
                                   </div>
                                </div>
        
                                <div class="col-md-6">
                                   <div class="form-group">
                                      <div class="input-group">
                                         <span class="input-group-addon">
                                            <span class="glyphicon glyphicon-home" aria-hidden="true"></span>
                                         </span>
                                         <input name="Address_Country" type="text" class="form-control" placeholder="Country" aria-describedby="user-address-country" value="Canada">
                                      </div>
                                   </div>
                                </div>
                             </div>
                            <?php endif; ?>
                            <?php if(\Curator\Config\FORM\RECAPTCHA) : ?>
                             <div class="row">
                                <div class="col-md-12">
                                    <div class="g-recaptcha" data-sitekey="6LcqUxkTAAAAABsa1qL9zJKgw_1Yho5O06YF_OBm"></div>
                                </div>
                             </div>
                             <?php endif; ?>
                             <div class="row">
                                <div class="col-md-12">
                                   <input name="username" autocomplete="off" type="hidden" value="">
                                   <input name="cToken" autocomplete="off" type="hidden" value="<?=$this->Form->assignToken();?>">
                                   <button name="Form_Type" value ="Create_Account" type="submit" class="btn btn-info btn-block">OK</button>
                                </div>
                             </div>

                            <?php endif; ?>

                          </fieldset>
                       </form>
                  </div>
               </div>
            </div>
         </div>

        <script>
            $(document).ready(function(){
                $('[data-toggle="tooltip"]').tooltip({
                    container: "body",
                    placement: "top"
                });   
            });
        </script>