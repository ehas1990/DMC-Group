<!-- Modal -->
<div class="modal fade" id="editproject<?php echo $rowss->id?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered maxwidth--medium" role="document">
    <div class="modal-content modal-content-radius-twt">
      <div class="modal-header">
        <h5 class="modal-title addusertitle--v" id="addusertitle">Update  Bank Loan</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="adduser--modal-container">
        <form action="<?php echo base_url().'admin/BankLoan/UpdateLoandetails'?>" method="post"  enctype="multipart/form-data" onsubmit="return check()">
             <?php
             $id=$this->uri->segment(4);
             $loan_number=$this->uri->segment(5);
             ?>
        
       
         <input type="hidden" name="id"        value="<?php echo $row->id?>" >
        
        <div class="row">
                                <div class="col-lg-4 col-mb">
                                    <div class="add_ftm-grp">
                                    <input placeholder=" Date" name="date"  value="<?php echo $row->date?>" class="input-box" type="text" onfocus="(this.type='date')" onblur="(this.type='text')" id="date" required >
   
                                    </div>
                                </div>
                               
                                <div class="col-lg-4 col-mb">
                                    <div class="add_ftm-grp">
                                        <input placeholder="Name of Bank" name="name_of_bank"  value="<?php echo $row->name_of_bank?>"   class="input-box" type="text"  >
                                    </div>
                                </div>
                                <div class="col-lg-4 col-mb">
                                    <div class="add_ftm-grp">
                                        <input placeholder="Name " name="name"  value="<?php echo $row->name?>"   class="input-box" type="text"  >
                                    </div>
                                </div>

                                <div class="col-lg-4 col-mb">
                                    <div class="add_ftm-grp">
                                        <select class="input-box" name="loan_number" id="loan_numberr" disabled>
                                        <option value="">Select Loan Number</option>
                                    <?php
                                            foreach($loan as $loan_s)
                                            {
                                            ?>
                              <option <?php if($loan_s->loan_number==$row->loan_number){ ?> selected <?php } ?> value="<?php echo $loan_s->loan_number?>"><?php echo $loan_s->loan_number?></option>

                                    <?php
                                            }
                                            ?>
                                      
                                        </select>
                                    </div>
                                </div>
                                <div class="col-lg-4 col-mb">
                                    <div class="add_ftm-grp">
                                        <input placeholder="Total Loan Amount" name="total_loan_amount" id="total_loan_amountt"  class="input-box" type="text" disabled >
                                    </div>
                                </div>
                                <div class="col-lg-4 col-mb">
                                    <div class="add_ftm-grp">
                                        <input placeholder="Weight" name="gram"  value="<?php echo $row->gram?>"  class="input-box" type="text"  required>
                                    </div>
                                </div>
                               

                                <div class="col-lg-4 col-mb">
                                    <div class="add_ftm-grp">
                                        <input type="text" name="details_of_gold" value="<?php echo $row->details_of_gold?>" class="input-box" placeholder="Details of Oranaments">
                                    </div>
                                </div>

                                <div class="col-lg-4 col-mb">
                                    <div class="add_ftm-grp">
                                        <input type="text" name="loan_amount" id="loan_amountt" value="<?php echo $row->amount_in_bank?>" class="input-box" placeholder="Loan Amount" disabled>
                                    </div>
                                </div>
                                <div class="col-lg-4 col-mb">
                                    <div class="add_ftm-grp">
                                        <input type="text" name="no_of_days" id="no_of_dayss" value="<?php echo $row->no_of_days?>" class="input-box" placeholder="No Of Days" disabled>
                                    </div>
                                </div>
                                <div class="col-lg-4 col-mb">
                                    <div class="add_ftm-grp">
                                        <input type="text" name="interst_rate" id="interst_ratee" value="<?php echo $row->interest_in_bank?>" class="input-box" placeholder="Interst rate" disabled>
                                    </div>
                                </div>
                                <div class="col-lg-4 col-mb">
                                    <div class="add_ftm-grp">
                                        <input type="text" name="excess_amount_in_bank" id="excess_amount_in_bankk" value="<?php echo $row->excess_amount_in_bank?>" class="input-box" placeholder="Excess amount in hand" disabled>
                                    </div>
                                </div>

                                <div class="col-lg-4 col-mb">
                                    <div class="add_ftm-grp">
                                        <input type="text" name="addition_amount_in_bank" id="addition_amount_in_bankk" value="<?php echo $row->addition_amount_in_bank?>" class="input-box" placeholder="Addition amount given" disabled>
                                    </div>
                                </div>
                                <div class="col-lg-4 col-mb">
                                    <div class="add_ftm-grp">
                                    <input placeholder="Due Date" name="due_date"  class="input-box" type="text" value="<?php echo $row->due_date?>" onfocus="(this.type='date')" onblur="(this.type='text')" id="date" required>
   
                                    </div>
                                    </div> 
                                <div class="col-lg-4 col-mb">
                                    <div class="add_ftm-grp">
                                    <input placeholder="Closing Date" name="closing_date"  value="<?php echo $row->closing_date?>" class="input-box" type="text" onfocus="(this.type='date')" onblur="(this.type='text')" id="date" required>
   
                                    </div>
                                    </div> 

                                    <div class="col-lg-4 col-mb">
                               
                                    <div class="add_ftm-grp">
                                        <select name="status">
                                            <option <?php if($row->status==1){?> selected <?php } ?> value="1">Open</opyion>
                                            <option <?php if($row->status==2){?> selected <?php } ?> value="2">Closed</opyion>
                                          </select>
                                    </div>
                                </div>
                              
                                <div class="col-lg-12 col-mb">
                                    <div class="add_ftm-grp">
                                    <textarea name="remark" style="height: 200px;"  class="form-control"  placeholder="Remarks" ><?php echo $row->remark?></textarea>
                                    </div>
                                </div>
                               
                               

                            </div>      
                            <div class="add_ftm-grp flex-group-btn modal-grp-frm--btn-container mtop-20">
        <button type="submit"  class="modal-submit-btn-mx-fit-content" >Update</button>
                            </div>
                        <!-- <div class="sg_ftm-grp flex-grp">
                        <button type="submit"  class="modal-submit-btn" >Create Offer</button>
                            <a href="create-offer.html">Create Offer</a>
                         </div> -->
                    </div>
                   
        </div>
                                        </form>
                                        
      <div class="modal-footer">
     
                            </div>
                            </div>
      </div>
    </div>
  </div>
</div>