<?php
echo $this->Flash->render();
if(!empty($user->profile->image_path) && file_exists(WWW_ROOT.DS.'system'.DS.'uploads'.DS.$user->profile->image_path)){
  
  $path = $user->profile->image_path;

}else{

  $path = 'default.png';

}
?>
<div class="mB20">
    <div class="immagine">
        <?php echo $this->Html->image('/system/uploads/'.$path, ['alt' => 'Profile' , 'max-width' => '100%']); ?>
    </div>
    <fieldset>
<div>
    <div class="basic_profile">
        <h2>Basic Profile Section</h2> 
        <ul class="list-group">
            <li class="list-group-item">
                Email - <?php  echo $user->email; ?>
            </li>
            <li class="list-group-item">
                graduating year - <?php  echo $user->profile->graduating_year; ?>
            </li>
            <li class="list-group-item">
                School - <?php  echo $user->profile->school_name; ?>
            </li>
            <li class="list-group-item">
                graduating files -
                <div class="spansInblock row">
                    <?php
                    if(!empty($file['graduationDocument'])){
                        foreach ($file['graduationDocument'] as $key => $value){ ?>
                            <span class="col-sm-3">
                                    <?php if(!$value->approved){ ?>
                                        <button type="button" class="btn btn-danger delete" value="<?php echo $key?>">
                                            Approve
                                        </button>
                                    <?php } ?>
                                <?php
                                    echo $this->Html->link($value->file_name,['action'=>'download',$value->file_path]);
                                ?>
                            </span>
                    <?php
                        }
                    } ?>
                    
                </div>
            </li>
            <li class="list-group-item">
                gender - <?php  echo __('gender.type',[$user->profile->gender]); ?>
            </li>
            <li class="list-group-item">
                Race Ethnicity - <?php echo __('race.ethnicity', [$user->profile->race_ethnicity]); ?>
            </li>
            <li class="list-group-item">
                Foreign Nationality - <?php  echo __('Yes.No',[$user->profile->foreign_nationality]); ?>
            </li>
            <li class="list-group-item">
                City - <?php echo $user->profile->city; ?>
            </li>
            <li class="list-group-item">
                State - <?php echo $user->profile->state; ?>
            </li>

            <li class="list-group-item">
                English First Language - <?php  echo __('Yes.No',[$user->profile->english_first_language]) ?>
            </li>
            <li class="list-group-item">
                Other Language Spoken - <?php echo $user->profile->other_language_spoken; ?>
            </li>
            <li class="list-group-item">
                Other Language Spoken files -
                <div class="spansInblock row">
                    <?php
                    if(!empty($file['languageFile'])){
                        foreach ($file['languageFile'] as $key => $value){ ?>
                            <span class="col-sm-3">
                                <?php if(!$value->approved){ ?>
                                    <button type="button" class="btn btn-danger delete" value="<?php echo $key?>">
                                        Approve
                                    </button>
                                <?php } ?>
                                <?php
                                    echo $this->Html->link($value->file_name,['action'=>'download',$value->file_path]);
                                ?>
                            </span>
                    <?php
                        }
                    } ?>
                </div>
            </li> 
        </ul>
        
    
      <div class="application_profile">
        <h2>College Application Profile</h2>
      <section> 
      <h3> College Application Background</h3> 
        <ul class="list-group">
          <li class="list-group-item">
            Short Description - <?php echo $user->profile->notes; ?> 
          </li>
          <li class="list-group-item">
            Application Standing - <?php echo __('Application.Standing',[$user->profile->application_standing]); ?>
          </li>
          <li class="list-group-item">
                Application Standing files -
                <div class="spansInblock row">
                <?php
                if(!empty($file['application_standing_file'])){
                    foreach ($file['application_standing_file'] as $key => $value){ ?>
                        <span class="col-sm-3">
                            <?php if(!$value->approved){ ?>
                                <button type="button" class="btn btn-danger delete" value="<?php echo $key?>">
                                    Approve
                                </button>
                            <?php } ?>
                            <?php
                                echo $this->Html->link($value->file_name,['action'=>'download',$value->file_path]);
                            ?>
                        </span>
              <?php
                    }
                }
                 ?>
                </div>
          </li>
          <li class="list-group-item">
            Legacy - <?php echo __('Legacy.type',[$user->profile->legacy]); ?>
          </li>
          <li class="list-group-item">
            Admission Round - <?php echo __('Admission.Round',[$user->profile->admission_round]);  ?>
          </li>
          <li class="list-group-item">
             files:
            <div class="spansInblock row">
               <?php
               if(!empty($file['upload_admission_round'])){
                   foreach ($file['upload_admission_round'] as $key => $value){ ?>
                       <span class="col-sm-3">
                           <?php if(!$value->approved){ ?>
                               <button type="button" class="btn btn-danger delete" value="<?php echo $key?>">
                                   Approve
                               </button>
                           <?php } ?>
                         <?php                            
                         echo $this->Html->link($value->file_name,['action'=>'download',$value->file_path]);                        
                         ?>
                       </span>
             <?php
                   }
               }
                ?>
            </div>
          </li>
          <li class="list-group-item">
              Number of schools - <?php echo $user->profile->number_of_schools; ?>
          </li>
          <li class="list-group-item">
            Number of schools files -
           <div class="spansInblock row">
              <?php
              if(!empty($file['number_of_schools_files'])){
                  foreach ($file['number_of_schools_files'] as $key => $value){ ?>
                   <span class="col-sm-3">
                          <?php if(!$value->approved){ ?>
                              <button type="button" class="btn btn-danger delete" value="<?php echo $key?>">
                                  Approve
                              </button>
                        <?php } ?>
                        <?php
                            echo $this->Html->link($value->file_name,['action'=>'download',$value->file_path]);
                        ?>
                      </span>
            <?php
                  }
              }
               ?>
           </div>
          </li>
          <li class="list-group-item">
            Accepted at (names of school) - <?php echo $user->profile->accepted_names_of_school; ?>
          </li>
          <li class="list-group-item">
            Accepted at (names of school) files -
            <div class="spansInblock row">
              <?php
              if(!empty($file['accepted_names_of_school_file'])){
                  foreach ($file['accepted_names_of_school_file'] as $key => $value){ ?>
                      <span class="col-sm-3">
                          <?php if(!$value->approved){ ?>
                              <button type="button" class="btn btn-danger delete" value="<?php echo $key?>">
                                  Approve
                              </button>
                          <?php } ?>
                        <?php
                            echo $this->Html->link($value->file_name,['action'=>'download',$value->file_path]);
                        ?>
                      </span>
            <?php
                  }
              }
               ?>
            </div>
          </li>
          <li class="list-group-item">
            Denied at (names of school) - <?php echo $user->profile->denied_names_of_school; ?>
          </li>
          <li class="list-group-item">
            files:
            <div class="spansInblock row">
              <?php
              if(!empty($file['denied_names_of_school_file'])){
                  foreach ($file['denied_names_of_school_file'] as $key => $value){ ?>
                      <span class="col-sm-3">
                          <?php if(!$value->approved){ ?>
                              <button type="button" class="btn btn-danger delete" value="<?php echo $key?>">
                                  Approve
                              </button>
                          <?php } ?>
                        <?php
                            echo $this->Html->link($value->file_name,['action'=>'download',$value->file_path]);
                        ?>
                      </span>
            <?php
                  }
              }
               ?>
            </div>
          </li>
          <li class="list-group-item">
            Wait listed - <?php echo __('Yes.No',[$user->profile->wait_listed]); ?>
          </li>
          <li class="list-group-item">
            Wait listed files -
             <div class="spansInblock row">
              <?php
              if(!empty($file['wait_listed_file'])){
                  foreach ($file['wait_listed_file'] as $key => $value){ ?>
                      <span class="col-sm-3">
                          <?php if(!$value->approved){ ?>
                              <button type="button" class="btn btn-danger delete" value="<?php echo $key?>">
                                  Approve
                              </button>
                          <?php } ?>
                        <?php
                            echo $this->Html->link($value->file_name,['action'=>'download',$value->file_path]);
                        ?>
                      </span>
            <?php
                  }
              }
               ?>
             </div>
          </li>
          <li class="list-group-item">
            Scholarships - <?php echo $user->profile->scholarships; ?>
          </li>
          <li class="list-group-item">
           Scholarships files -
             <div class="spansInblock row">
              <?php
              if(!empty($file['scholarships_file'])){
                  foreach ($file['scholarships_file'] as $key => $value){ ?>
                      <span class="col-sm-3">
                          <?php if(!$value->approved){ ?>
                              <button type="button" class="btn btn-danger delete" value="<?php echo $key?>">
                                  Approve
                              </button>
                          <?php } ?>
                        <?php
                            echo $this->Html->link($value->file_name,['action'=>'download',$value->file_path]);
                        ?>
                      </span>
            <?php
                  }
              }
               ?>
             </div>
          </li>
          <li class="list-group-item">
              Interviewed - <?php echo __('Yes.No',[$user->profile->interviewed]); ?>
          </li>
          <li class="list-group-item">
            Interviewed files -
              <div class="spansInblock row">
              <?php
              if(!empty($file['interviewed_file'])){
                  foreach ($file['interviewed_file'] as $key => $value){ ?>
                      <span class="col-sm-3">
                          <?php if(!$value->approved){ ?>
                              <button type="button" class="btn btn-danger delete" value="<?php echo $key?>">
                                  Approve
                              </button>
                          <?php } ?>
                        <?php
                            echo $this->Html->link($value->file_name,['action'=>'download',$value->file_path]);
                        ?>
                      </span>
            <?php
                  }
              }
               ?>
              </div>
          </li>
        </ul>
      </section>
    <section> <h3>Test Scores</h3>
      <ul class="list-group">
          <li class="list-group-item">
            Highest SAT - <?php echo $user->profile->highest_sat; ?>
          </li>
          <li class="list-group-item">
            files:
             <div class="spansInblock row">
              <?php
              if(!empty($file['highest_sat_file'])){
                  foreach ($file['highest_sat_file'] as $key => $value){ ?>
                      <span class="col-sm-3">
                          <?php if(!$value->approved){ ?>
                              <button type="button" class="btn btn-danger delete" value="<?php echo $key?>">
                                  Approve
                              </button>
                          <?php } ?>
                        <?php
                            echo $this->Html->link($value->file_name,['action'=>'download',$value->file_path]);
                        ?>
                      </span>
            <?php
                  }
              }
               ?>
             </div>
          </li>
          <li class="list-group-item">
            Other SAT scores - <?php echo $user->profile->other_sat_scores ?>
          </li>
          <li class="list-group-item">
            Other SAT scores files -
            <div class="spansInblock row">
              <?php
              if(!empty($file['other_sat_scores_file'])){
                  foreach ($file['other_sat_scores_file'] as $key => $value){ ?>
                      <span class="col-sm-3">
                          <?php if(!$value->approved){ ?>
                              <button type="button" class="btn btn-danger delete" value="<?php echo $key?>">
                                  Approve
                              </button>
                          <?php } ?>
                        <?php
                            echo $this->Html->link($value->file_name,['action'=>'download',$value->file_path]);
                        ?>
                      </span>
            <?php
                  }
              }
               ?>
            </div>
          </li>
          <li class="list-group-item">
            Number of times taken - <?php echo $user->profile->number_of_times_taken ?>
          </li>
          <li class="list-group-item">
            SAT Preparation - <?php echo __('SAT.Preparation',[$user->profile->sat_ppreparation]); ?>
          </li>
          <li class="list-group-item">
            Improvement - <?php echo __('Improvement.type',[$user->profile->improvement]); ?>
          </li>
          <li class="list-group-item">
            SAT IIs - <?php echo $user->profile->sat_iis ?>
          </li>
          <li class="list-group-item">
            files:
           <div class="spansInblock row">
              <?php
              if(!empty($file['sat_iis_file'])){
                  foreach ($file['sat_iis_file'] as $key => $value){ ?>
                      <span class="col-sm-3">
                          <?php if(!$value->approved){ ?>
                              <button type="button" class="btn btn-danger delete" value="<?php echo $key?>">
                                  Approve
                              </button>
                          <?php } ?>
                        <?php
                            echo $this->Html->link($value->file_name,['action'=>'download',$value->file_path]);
                        ?>
                      </span>
            <?php
                  }
              }
               ?>
           </div>
          </li>
          <li class="list-group-item">
            Highest ACT - <?php echo $user->profile->highest_act; ?>
          </li>
          <li class="list-group-item">
            files:
             <div class="spansInblock row">
              <?php
              if(!empty($file['highest_act_file'])){
                  foreach ($file['highest_act_file'] as $key => $value){ ?>
                      <span class="col-sm-3">
                          <?php if(!$value->approved){ ?>
                              <button type="button" class="btn btn-danger delete" value="<?php echo $key?>">
                                  Approve
                              </button>
                          <?php } ?>
                        <?php
                            echo $this->Html->link($value->file_name,['action'=>'download',$value->file_path]);
                        ?>
                      </span>
            <?php
                  }
              }
               ?>
             </div>
          </li>
          <li class="list-group-item">
            Number of times taken - <?php echo $user->profile->number_of_times_taken_test; ?>
          </li>
          <li class="list-group-item">
            ACT Preparation - <?php echo __('SAT.Preparation',[$user->profile->act_preparation]); ?>
          </li>
          <li class="list-group-item">
            Improvement - <?php echo __('Improvement.type',[$user->profile->improvement_test]); ?>
          </li>
          <li class="list-group-item">
            PSAT Scores - <?php echo __('Improvement.type',[$user->profile->psat_scores]); ?>
          </li>
          <li class="list-group-item">
            Other Standardized Tests - <?php echo __('Improvement.type',[$user->profile->other_standardized_tests]); ?>
          </li> 
      </ul>
    </section>
      <section>
      <h4>High School Performance Section</h4>
      <ul class="list-group">
        <li class="list-group-item">
          GPA - <?php echo $user->profile->gpa; ?>
        </li>
        <li class="list-group-item">
            files:
            <div class="spansInblock row">
              <?php
              if(!empty($file['gpa_file'])){
                  foreach ($file['gpa_file'] as $key => $value){ ?>
                      <span class="col-sm-3">
                          <?php if(!$value->approved){ ?>
                              <button type="button" class="btn btn-danger delete" value="<?php echo $key?>">
                                  Approve
                              </button>
                          <?php } ?>
                        <?php
                            echo $this->Html->link($value->file_name,['action'=>'download',$value->file_path]);
                        ?>
                      </span>
            <?php
                  }
              }
               ?>
            </div>
        </li>
        <li class="list-group-item">
          AP/IB classes and scores - <?php echo $user->profile->ap_ib_classes_and_scores; ?>
        </li>
        <li class="list-group-item">
            files:
         <div class="spansInblock row">
              <?php
              if(!empty($file['ap_ib_classes_and_scores_file'])){
                  foreach ($file['ap_ib_classes_and_scores_file'] as $key => $value){ ?>
                      <span class="col-sm-3">
                          <?php if(!$value->approved){ ?>
                              <button type="button" class="btn btn-danger delete" value="<?php echo $key?>">
                                  Approve
                              </button>
                          <?php } ?>
                        <?php
                            echo $this->Html->link($value->file_name,['action'=>'download',$value->file_path]);
                        ?>
                      </span>
            <?php
                  }
              }
               ?>
         </div>
        </li>
        <li class="list-group-item">
          Ranking - <?php echo $user->profile->ranking; ?>
        </li>
        <li class="list-group-item">
            files:
          <div class="spansInblock row">
              <?php
              if(!empty($file['ranking_file'])){
                  foreach ($file['ranking_file'] as $key => $value){ ?>
                      <span class="col-sm-3">
                          <?php if(!$value->approved){ ?>
                              <button type="button" class="btn btn-danger delete" value="<?php echo $key?>">
                                  Approve
                              </button>
                          <?php } ?>
                        <?php
                            echo $this->Html->link($value->file_name,['action'=>'download',$value->file_path]);
                        ?>
                      </span>
            <?php
                  }
              }
               ?>
          </div>
        </li>
        <li class="list-group-item">
          High School Type - <?php echo __('HighSchool.Type',[$user->profile->high_school_type]); ?>
        </li>
      </ul>
    </section>
    <section> <h4>Extracurricular & Awards</h4> 
      <ul class="list-group">
        <li class="list-group-item">
          Sports - <?php echo __('Yes.No',[$user->profile->sports]); ?>
        </li>
        <li class="list-group-item">
          Extracurricular activities - <?php echo __('Yes.No',[$user->profile->extracurricular_activities]) ?>
        </li>
        <li class="list-group-item">
          Summer Activities - <?php echo $user->profile->summer_activities;  ?>
        </li>
        <li class="list-group-item">
          Work - <?php echo $user->profile->work; ?>
        </li>
        <li class="list-group-item">
          Awards received - <?php echo $user->profile->awards_received; ?>
        </li>
        <li class="list-group-item">
            files:
            <div class="spansInblock row">
              <?php
              if(!empty($file['awards_received_file'])){
                  foreach ($file['awards_received_file'] as $key => $value){ ?>
                      <span class="col-sm-3">
                          <?php if(!$value->approved){ ?>
                              <button type="button" class="btn btn-danger delete" value="<?php echo $key?>">
                                  Approve
                              </button>
                          <?php } ?>
                        <?php
                            echo $this->Html->link($value->file_name,['action'=>'download',$value->file_path]);
                        ?>
                      </span>
            <?php
                  }
              }
               ?>
            </div>
        </li>
      </ul> 
    </section>
    <section> <h4>Essays</h4> 
      <ul class="list-group">
        <li class="list-group-item">
          Essays - <?php echo $user->profile->essays; ?>
        </li>
        <li class="list-group-item">
            files:
              <div class="spansInblock row">
              <?php
              if(!empty($file['essays_file'])){
                  foreach ($file['essays_file'] as $key => $value){ ?>
                      <span class="col-sm-3">
                          <?php if(!$value->approved){ ?>
                              <button type="button" class="btn btn-danger delete" value="<?php echo $key?>">
                                  Approve
                              </button>
                          <?php } ?>
                        <?php
                            echo $this->Html->link($value->file_name,['action'=>'download',$value->file_path]);
                        ?>
                      </span>
            <?php
                  }
              }
               ?>
              </div>
        </li>
      </ul>
    </Section>
    <h2>Graduate School Application Profile</h2>
  <section> 
      <h3>Graduate School application background</h3>
      <ul class="list-group">
        <li class="list-group-item">
          Short description - <?php echo $user->profile->short_description; ?>
        </li>
        <li class="list-group-item">  
          Legacy - <?php echo __('Legacy.type',[$user->profile->legacy_graduate]); ?>
        </li>
        <li class="list-group-item">
          Admission round, can be verified with uploading relevant emails or records - <?php echo __('Admission.Round',[$user->profile->admission_round_graduate]); ?>
        </li>
        <li class="list-group-item">
            files:
           <div class="spansInblock row">
              <?php
              if(!empty($file['admission_round_graduate_file'])){
                  foreach ($file['admission_round_graduate_file'] as $key => $value){ ?>
                      <span class="col-sm-3">
                          <?php if(!$value->approved){ ?>
                              <button type="button" class="btn btn-danger delete" value="<?php echo $key?>">
                                  Approve
                              </button>
                          <?php } ?>
                        <?php
                            echo $this->Html->link($value->file_name,['action'=>'download',$value->file_path]);
                        ?>
                      </span>
            <?php
                  }
              }
               ?>
           </div>
        </li> 
        <li class="list-group-item">
          Applied to (number of schools): number input by user, can be verified with uploading relevant records - <?php echo $user->profile->applied_to_number_of_schools; ?>
        </li>
        <li class="list-group-item">
            files:
          <div class="spansInblock row">
              <?php
              if(!empty($file['applied_to_number_of_schools_file'])){
                  foreach ($file['applied_to_number_of_schools_file'] as $key => $value){ ?>
                      <span>
                          <?php if(!$value->approved){ ?>
                              <button type="button" class="btn btn-danger delete" value="<?php echo $key?>">
                                  Approve
                              </button>
                          <?php } ?>
                        <?php
                            echo $this->Html->link($value->file_name,['action'=>'download',$value->file_path]);
                        ?>
                      </span>
            <?php
                  }
              }
               ?>
          </div>
        </li>
        <li class="list-group-item">
          Accepted at (names of school): input by user, can be verified with uploading relevant acceptance letters - <?php echo $user->profile->accepted_at_names_of_school; ?>
        </li>
        <li class="list-group-item">
            files:
          <div class="spansInblock row">
              <?php
              if(!empty($file['accepted_at_names_of_school_file'])){
                  foreach ($file['accepted_at_names_of_school_file'] as $key => $value){ ?>
                      <span class="col-sm-3">
                          <?php if(!$value->approved){ ?>
                              <button type="button" class="btn btn-danger delete" value="<?php echo $key?>">
                                  Approve
                              </button>
                          <?php } ?>
                        <?php
                            echo $this->Html->link($value->file_name,['action'=>'download',$value->file_path]);
                        ?>
                      </span>
            <?php
                  }
              }
               ?>
          </div>
        </li>
        <li class="list-group-item">
          Denied at (names of school): input by user, can be verified with uploading relevant rejection letters - <?php echo $user->profile->denied_at_names_of_school; ?>
        </li>
        <li class="list-group-item">
            files:
         <div class="spansInblock row">
              <?php
              if(!empty($file['denied_at_names_of_school_file'])){
                  foreach ($file['denied_at_names_of_school_file'] as $key => $value){ ?>
                      <span>
                          <?php if(!$value->approved){ ?>
                              <button type="button" class="btn btn-danger delete" value="<?php echo $key?>">
                                  Approve
                              </button>
                          <?php } ?>
                        <?php
                            echo $this->Html->link($value->file_name,['action'=>'download',$value->file_path]);
                        ?>
                      </span>
            <?php
                  }
              }
               ?>
         </div>
        </li>
        <li class="list-group-item">
          Wait-listed - <?php echo __('Yes.No',[$user->profile->wait_listed_graduate]); ?>
        </li>
        <li class="list-group-item">
            files:
            <div class="spansInblock row">
              <?php
              if(!empty($file['wait_listed_graduate_file'])){
                  foreach ($file['wait_listed_graduate_file'] as $key => $value){ ?>
                      <span class="col-sm-3">
                          <?php if(!$value->approved){ ?>
                              <button type="button" class="btn btn-danger delete" value="<?php echo $key?>">
                                  Approve
                              </button>
                          <?php } ?>
                        <?php
                            echo $this->Html->link($value->file_name,['action'=>'download',$value->file_path]);
                        ?>
                      </span>
            <?php
                  }
              }
               ?>
            </div>
        </li>
        <li class="list-group-item">
          Scholarships - <?php echo $user->profile->scholarships_graduate; ?>
        </li>
        <li class="list-group-item">
            files:
           <div class="spansInblock row">
              <?php
              if(!empty($file['scholarships_graduate_file'])){
                  foreach ($file['scholarships_graduate_file'] as $key => $value){ ?>
                      <span>
                          <?php if(!$value->approved){ ?>
                              <button type="button" class="btn btn-danger delete" value="<?php echo $key?>">
                                  Approve
                              </button>
                          <?php } ?>
                        <?php
                            echo $this->Html->link($value->file_name,['action'=>'download',$value->file_path]);
                        ?>
                      </span>
            <?php
                  }
              }
               ?>
           </div>
        </li>
        <li class="list-group-item">
          Interviewed - <?php echo __('Yes.No',[$user->profile->interviewed_graduate]); ?>
        </li>
        <li class="list-group-item">
            files:
          <div class="spansInblock row">
              <?php
              if(!empty($file['interviewed_graduate_file'])){
                  foreach ($file['interviewed_graduate_file'] as $key => $value){ ?>
                      <span class="col-sm-3">
                          <?php if(!$value->approved){ ?>
                              <button type="button" class="btn btn-danger delete" value="<?php echo $key?>">
                                  Approve
                              </button>
                          <?php } ?>
                        <?php                            
                        echo $this->Html->link($value->file_name,['action'=>'download',$value->file_path]);                        
                        ?>
                      </span>
            <?php
                  }
              }
               ?>
          </div>
        </li>
      </ul>
    </section>
    <section> <h4>Test Scores</h4>
      <ul class="list-group">
        <li class="list-group-item">
          GMAT - <?php echo __('Yes.No',[$user->profile->gmat]); ?>
        </li>
        <li class="list-group-item">
            files:
            <div class="spansInblock row">
              <?php
              if(!empty($file['gmat_file'])){
                  foreach ($file['gmat_file'] as $key => $value){ ?>
                      <span class="col-sm-3">
                          <?php if(!$value->approved){ ?>
                              <button type="button" class="btn btn-danger delete" value="<?php echo $key?>">
                                  Approve
                              </button>
                          <?php } ?>
                        <?php                            
                        echo $this->Html->link($value->file_name,['action'=>'download',$value->file_path]);                        
                        ?>
                      </span>
            <?php
                  }
              }
               ?>
            </div>
        </li>
        <li class="list-group-item">
          GRE - <?php echo __('Yes.No',[$user->profile->gre]); ?>
        </li>
        <li class="list-group-item">
            files:
           <div class="spansInblock row">
              <?php
              if(!empty($file['gre_file'])){
                  foreach ($file['gre_file'] as $key => $value){ ?>
                      <span class="col-sm-3">
                          <?php if(!$value->approved){ ?>
                              <button type="button" class="btn btn-danger delete" value="<?php echo $key?>">
                                  Approve
                              </button>
                          <?php } ?>
                        <?php                            
                        echo $this->Html->link($value->file_name,['action'=>'download',$value->file_path]);                        
                        ?>
                      </span>
            <?php
                  }
              }
               ?>
           </div>
        </li>
        <li class="list-group-item">
          LSAT - <?php echo __('Yes.No',[$user->profile->lsat]); ?>
        </li>
        <li class="list-group-item">
            files:
          <div class="spansInblock row">
              <?php
              if(!empty($file['lsat_file'])){
                  foreach ($file['lsat_file'] as $key => $value){ ?>
                      <span class="col-sm-3">
                          <?php if(!$value->approved){ ?>
                              <button type="button" class="btn btn-danger delete" value="<?php echo $key?>">
                                  Approve
                              </button>
                          <?php } ?>
                        <?php                            
                        echo $this->Html->link($value->file_name,['action'=>'download',$value->file_path]);                        
                        ?>
                      </span>
            <?php
                  }
              }
               ?>
          </div>
        </li>
        <li class="list-group-item">
          MCAT - <?php echo __('Yes.No',[$user->profile->mcat]) ?>
        </li>
        <li class="list-group-item">
            files:
        <div class="spansInblock row">
              <?php
              if(!empty($file['mcat_file'])){
                  foreach ($file['mcat_file'] as $key => $value){ ?>
                      <span class="col-sm-3">
                          <?php if(!$value->approved){ ?>
                              <button type="button" class="btn btn-danger delete" value="<?php echo $key?>">
                                  Approve
                              </button>
                          <?php } ?>
                        <?php                            
                        echo $this->Html->link($value->file_name,['action'=>'download',$value->file_path]);                        
                        ?>
                      </span>
            <?php
                  }
              }
               ?>
        </div>
        </li>
        <li class="list-group-item">
          Other Standardized Tests - <?php echo __('Yes.No',[$user->profile->other_standardized_tests_graduate]); ?>
        </li>
        <li class="list-group-item">
            files:
          <div class="spansInblock row">
              <?php
              if(!empty($file['other_standardized_tests_graduate_file'])){
                  foreach ($file['other_standardized_tests_graduate_file'] as $key => $value){ ?>
                      <span class="col-sm-3">
                          <?php if(!$value->approved){ ?>
                              <button type="button" class="btn btn-danger delete" value="<?php echo $key?>">
                                  Approve
                              </button>
                          <?php } ?>
                        <?php                            
                        echo $this->Html->link($value->file_name,['action'=>'download',$value->file_path]);                        
                        ?>
                      </span>
            <?php
                  }
              }
               ?>
          </div>
        </li>
        <li class="list-group-item">
          Number of times taken - <?php echo $user->profile->number_of_times_taken_graduate; ?>
        </li>
        <li class="list-group-item">
            files:
            <div class="spansInblock row">
              <?php
              if(!empty($file['number_of_times_taken_graduate_file'])){
                  foreach ($file['number_of_times_taken_graduate_file'] as $key => $value){ ?>
                      <span class="col-sm-3">
                          <?php if(!$value->approved){ ?>
                              <button type="button" class="btn btn-danger delete" value="<?php echo $key?>">
                                  Approve
                              </button>
                          <?php } ?>
                        <?php                            
                        echo $this->Html->link($value->file_name,['action'=>'download',$value->file_path]);                        
                        ?>
                      </span>
            <?php
                  }
              }
               ?>
            </div>
        </li>
        <li class="list-group-item">
            Test Preparation - <?php echo __('Test.Preparation',[$user->profile->test_preparation]); ?>
        </li>
        <li class="list-group-item">
            Improvement - <?php echo __('Improvement.type',[$user->profile->improvement_graduate]); ?>
        </li>
      </ul>
    </section>
     <section> <h4>College Performance Section</h4>
        <ul class="list-group">
          <li class="list-group-item">
            Undergraduate School/s (input by user, verified with relevant records) - <?php echo $user->profile->undergraduate_school; ?>
          </li>
          <li class="list-group-item">
            files:
            <div class="spansInblock row">
              <?php
              if(!empty($file['undergraduate_school_file'])){
                  foreach ($file['undergraduate_school_file'] as $key => $value){ ?>
                      <span class="col-sm-3">
                          <?php if(!$value->approved){ ?>
                              <button type="button" class="btn btn-danger delete" value="<?php echo $key?>">
                                  Approve
                              </button>
                          <?php } ?>
                        <?php                            echo $this->Html->link($value->file_name,['action'=>'download',$value->file_path]);                        ?>
                      </span>
            <?php
                  }
              }
               ?>
            </div>
          </li>
          <li class="list-group-item">
            Degree type - <?php echo __('Dgree.Type',[$user->profile->degree_type]); ?>
          </li>
          <li class="list-group-item">
            Majors (input by user, verified with relevant diplomas) - <?php echo $user->profile->majors; ?>
          </li>
          <li class="list-group-item">
            files:
            <div class="spansInblock row">
                <?php
                if(!empty($file['majors_file'])){
                    foreach ($file['majors_file'] as $key => $value){ ?>
                        <span class="col-sm-3">
                            <?php if(!$value->approved){ ?>
                                <button type="button" class="btn btn-danger delete" value="<?php echo $key?>">
                                    Approve
                                </button>
                            <?php } ?>
                          <?php                            
                          echo $this->Html->link($value->file_name,['action'=>'download',$value->file_path]);                        
                          ?>
                        </span>
              <?php
                    }
                }
                 ?>
            </div>
          </li>
          <li class="list-group-item">
            GPA - <?php echo $user->profile->performance_gta; ?>
          </li>
          <li class="list-group-item">
            files:
            <div class="spansInblock row">
              <?php
              if(!empty($file['performance_gta_file'])){
                  foreach ($file['performance_gta_file'] as $key => $value){ ?>
                      <span class="col-sm-3">
                          <?php if(!$value->approved){ ?>
                              <button type="button" class="btn btn-danger delete" value="<?php echo $key?>">
                                  Approve
                              </button>
                          <?php } ?>
                        <?php                            
                        echo $this->Html->link($value->file_name,['action'=>'download',$value->file_path]);                        
                        ?>
                      </span>
            <?php
                  }
              }
               ?>
            </div>
          </li>
          <li class="list-group-item">
            Undergraduate honors - <?php echo $user->profile->undergraduate_honors;  ?>
          </li>
          <li class="list-group-item">
            files:
            <div class="spansInblock row">
              <?php
              if(!empty($file['undergraduate_honors_file'])){
                  foreach ($file['undergraduate_honors_file'] as $key => $value){ ?>
                      <span class="col-sm-3">
                          <?php if(!$value->approved){ ?>
                              <button type="button" class="btn btn-danger delete" value="<?php echo $key?>">
                                  Approve
                              </button>
                          <?php } ?>
                        <?php                            
                        echo $this->Html->link($value->file_name,['action'=>'download',$value->file_path]);                        
                        ?>
                      </span>
            <?php
                  }
              }
               ?>
            </div>
          </li>
          <li class="list-group-item">
            Graduate School/s (input by user, verified with relevant records) - <?php echo $user->profile->graduate_school_performance_records; ?>
          </li>
          <li class="list-group-item">
            files:
             <div class="spansInblock row">
              <?php
              if(!empty($file['graduate_school_performance_records_file'])){
                  foreach ($file['graduate_school_performance_records_file'] as $key => $value){ ?>
                      <span class="col-sm-3">
                          <?php if(!$value->approved){ ?>
                              <button type="button" class="btn btn-danger delete" value="<?php echo $key?>">
                                  Approve
                              </button>
                          <?php } ?>
                        <?php                            
                        echo $this->Html->link($value->file_name,['action'=>'download',$value->file_path]);                        
                        ?>
                      </span>
            <?php
                  }
              }
               ?>
             </div>
          </li>
          <li class="list-group-item">
            Degree type - <?php echo __('PerformanceDegree.Type',[$user->profile->performance_degree_type]); ?>
          </li>
          <li  class="list-group-item">
            Majors (input by user, verified with relevant diplomas) - <?php echo $user->profile->performance_majors_diplomas; ?>
          </li>
          <li  class="list-group-item">
            files:
            <div class="spansInblock row">
              <?php
              if(!empty($file['performance_majors_diplomas_file'])){
                  foreach ($file['performance_majors_diplomas_file'] as $key => $value){ ?>
                      <span class="col-sm-3">
                          <?php if(!$value->approved){ ?>
                              <button type="button" class="btn btn-danger delete" value="<?php echo $key?>">
                                  Approve
                              </button>
                          <?php } ?>
                        <?php                            
                        echo $this->Html->link($value->file_name,['action'=>'download',$value->file_path]);                        
                        ?>
                      </span>
            <?php
                  }
              }
               ?>
            </div>
          </li>
          <li class="list-group-item">
            GPA: input by user, verified with uploading relevant school records - <?php echo $user->profile->gpa_input_by_user; ?>
          </li>
          <li class="list-group-item">
            files:
            <div class="spansInblock row">
              <?php
              if(!empty($file['gpa_input_by_user_file'])){
                  foreach ($file['gpa_input_by_user_file'] as $key => $value){ ?>
                      <span class="col-sm-3">
                          <?php if(!$value->approved){ ?>
                              <button type="button" class="btn btn-danger delete" value="<?php echo $key?>">
                                  Approve
                              </button>
                          <?php } ?>
                        <?php                            
                        echo $this->Html->link($value->file_name,['action'=>'download',$value->file_path]);                        
                        ?>
                      </span>
            <?php
                  }
              }
               ?>
            </div>
          </li>
          <li class="list-group-item">
            Graduate honors: input by user, verified with relevant docs - <?php echo $user->profile->graduate_honors_docs; ?>
          </li>
          <li class="list-group-item">
            files:
            <div class="spansInblock row">
              <?php
              if(!empty($file['graduate_honors_docs_file'])){
                  foreach ($file['graduate_honors_docs_file'] as $key => $value){ ?>
                      <span class="col-sm-3">
                          <?php if(!$value->approved){ ?>
                              <button type="button" class="btn btn-danger delete" value="<?php echo $key?>">
                                  Approve
                              </button>
                          <?php } ?>
                        <?php                            
                        echo $this->Html->link($value->file_name,['action'=>'download',$value->file_path]);                        
                        ?>
                      </span>
            <?php
                  }
              }
               ?>
            </div>
          </li>
        </ul>
      </section>
      <section> <h4> Extracurricular & Work Experience</h4>
        <ul class="list-group">
          <li class="list-group-item">
            Sports: drop-down selection by user, no verification unless received scholarships - <?php echo __('Yes.No',[$user->profile->extracurricular_sports]); ?>
          </li>
          <li class="list-group-item">
            Extracurricular activities - <?php echo __('Yes.No',[$user->profile->extracurricular_work_activities]); ?>
          </li>
          <li class="list-group-item">
             Internships experience (freshmen-year, sophomore-year, junior-year, senior-year, input by user, verifiable with uploading relevant records) - <?php echo __('ExtracurricularInternships.Experience',[$user->profile->extracurricular_internships_experience]); ?>
          </li>
          <li class="list-group-item">
            files:
              <div class="spansInblock row">
              <?php
              if(!empty($file['extracurricular_internships_experience_file'])){
                  foreach ($file['extracurricular_internships_experience_file'] as $key => $value){ ?>
                      <span class="col-sm-3">
                          <?php if(!$value->approved){ ?>
                              <button type="button" class="btn btn-danger delete" value="<?php echo $key?>">
                                  Approve
                              </button>
                          <?php } ?>
                        <?php                            
                        echo $this->Html->link($value->file_name,['action'=>'download',$value->file_path]);                        
                        ?>
                      </span>
            <?php
                  }
              }
               ?>
              </div>
          </li>
          <li class="list-group-item">
              Part-time job experience - <?php echo __('ExtracurricularInternships.Experience',[$user->profile->extracurricular_part_time_job_experience]); ?>
          </li>
          <li class="list-group-item">
            files:
              <div class="spansInblock row">
              <?php
              if(!empty($file['extracurricular_part_time_job_experience_file'])){
                  foreach ($file['extracurricular_part_time_job_experience_file'] as $key => $value){ ?>
                      <span class="col-sm-3">
                          <?php if(!$value->approved){ ?>
                              <button type="button" class="btn btn-danger delete" value="<?php echo $key?>">
                                  Approve
                              </button>
                          <?php } ?>
                        <?php                            
                        echo $this->Html->link($value->file_name,['action'=>'download',$value->file_path]);                        
                        ?>
                      </span>
            <?php
                  }
              }
               ?>
              </div>
          </li>
          <li class="list-group-item">
            Full-time job experience (post-graduation, verified with uploading relevant docs) - 
              <div class="spansInblock row">
                <?php 

                  if(!empty($file['full_time_job_experience_file'])){
                  foreach ($file['full_time_job_experience_file'] as $key => $value){ ?>
                      <span class="col-sm-3">
                          <?php if(!$value->approved){ ?>
                              <button type="button" class="btn btn-danger delete" value="<?php echo $key?>">
                                  Approve
                              </button>
                          <?php } ?>
                        <?php                            
                        echo $this->Html->link($value->file_name,['action'=>'download',$value->file_path]);                        
                        ?>
                      </span>
            <?php
                  }
              }
               ?>
              </div>
          </li>
        </ul>
      </section>
      <section> 
          <h4>Essays</h4>
         <ul class="list-group">
          <li class="list-group-item">
            Input by user, by uploading or typing in textbox - <?php  echo $user->profile->essays_text_area?>
          </li>
          <li class="list-group-item">
                files:
              <div class="spansInblock row">
                 <?php if(!empty($file['essays_text_area_file'])){
                  foreach ($file['essays_text_area_file'] as $key => $value){ ?>
                      <span class="col-sm-3">
                          <?php if(!$value->approved){ ?>
                              <button type="button" class="btn btn-danger delete" value="<?php echo $key?>">
                                  Approve
                              </button>
                          <?php } ?>
                        <?php                            
                        echo $this->Html->link($value->file_name,['action'=>'download',$value->file_path]);                        
                        ?>
                      </span>
            <?php
                  }
              }
               ?>
              </div>
          </li>
      </ul>
      </section>
  </fieldset>
    <div class="txtR">
      <?php echo $this->Html->link('Cancel',['action'=>'users'],['class' => 'btn btn-primary']); ?>
    </div>
</div>
<script type="text/javascript">
  $(document).ready(function(){
    $(document).on("click",".delete",function() {
      var id = $(this).val();
      var obj = $(this);
        $.ajax({
          url: "/admins/approveFile",
          type: 'POST',
          data: {id:id},
          dataType: "json",
           success: function(data){
                obj.remove();    
            }
        });
    });
});

</script>