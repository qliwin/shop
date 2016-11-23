

        <div class="block block1">  

            <div class="block box">
                <div class="blank"></div>
                <div id="ur_here">
                    当前位置: <a href="#">首页</a> <code>&gt;</code> 用户注册 
                </div>
            </div>
            <div class="blank"></div>


            <!--放入view具体内容-->

            <div class="block box">

                <div class="usBox">
                    <div class="usBox_2 clearfix">
                        <div class="logtitle3"></div>
                        <!--<form id="yw0" action="/index.php?r=user/register" method="post">-->
                            <?php $form = $this->beginWidget('CActiveForm',array(
                                'htmlOptions'=>array('enctype'=>'multipart/form-data'),
                                'id'=>'register-form',
                                'enableClientValidation'=>true, //引入jquery
                                'clientOptions'=>array(
                                    'validateOnSubmit'=>true,   //在提交时验证
                                ),
                            )); ?>
                            <table cellpadding="5" cellspacing="3" style="text-align:left; width:100%; border:0;">
                                <tbody>
                                    <tr>
                                        <td style="width:13%; text-align: right;">
                                            <?php echo $form->labelEx($user_model, 'username',array('class'=>'required')); ?>
                                            <!--<label for="User_username" class="required">用户名-->
                                            <!--<span class="required">*</span>-->
                                            <!--</label>-->
                                        </td>

                                        <td style="width:87%;">
                                            <?php echo $form->textField($user_model, 'username',array('class'=>'inputBg', 'id'=>'User_username')); ?>
                                            <?php echo $form->error($user_model, 'username'); ?>
                                            <!--<input class="inputBg" size="25" name="User[username]" id="User_username" type="text" value="" />                  -->
                                            <!--<span style="color:red;">用户名已经存在</span>-->
                                        </td>
                                    </tr>
                                    <tr>
                                        <td align="right">
                                            <?php echo $form->labelEx($user_model, 'password',array('class'=>'required')); ?>
                                            <!--<label for="User_password" class="required">密码 <span class="required">*</span></label>-->
                                        </td>

                                        <td>
                                            <?php echo $form->passwordField($user_model, 'password',array('id'=>'User_password')); ?>
                                            <?php echo $form->error($user_model, 'password'); ?>
                                            <!--<input class="inputBg" size="25" name="User[password]" id="User_password" type="password" value="" />         -->
                                        </td>
                                    </tr>
                                    <tr>
                                        <td align="right">
                                            <?php echo $form->labelEx($user_model, 'password2',array('class'=>'required')); ?>
                                            <!--<label for="User_password2">密码确认</label>-->
                                        </td>
                                        <td>
                                            <?php echo $form->passwordField($user_model, 'password2',array('id'=>'User_password2')); ?>
                                            <?php echo $form->error($user_model, 'password2'); ?>
                                            <!--<input class="inputBg" size="25" name="User[password2]" id="User_password2" type="password" />-->
                                        </td>

                                    </tr>
                                    <tr>
                                        <td align="right">
                                            <?php echo $form->labelEx($user_model, 'user_email'); ?>
                                            <!--<label for="User_user_email">邮箱</label>-->
                                        </td>
                                        <td>
                                            <?php echo $form->textField($user_model, 'user_email', array('id' => 'User_user_email')); ?>
                                            <?php echo $form->error($user_model, 'user_email'); ?>
                                            <!--<input class="inputBg" size="25" name="User[user_email]" id="User_user_email" type="text" value="" />    -->
                                        </td>
                                    </tr>
                                    <tr>
                                        <td align="right">
                                            <?php echo $form->labelEx($user_model, 'user_qq'); ?>
                                            <!--<label for="User_user_qq">qq号码</label>-->
                                        </td>
                                        <td>
                                            <?php echo $form->textField($user_model, 'user_qq', array('id' => 'User_user_qq')); ?>
                                            <?php echo $form->error($user_model, 'user_qq'); ?>
                                            <!--<input class="inputBg" size="25" name="User[user_qq]" id="User_user_qq" type="text" value="" />-->
                                        </td>
                                    </tr>
                                    <tr>
                                        <td align="right">
                                            <?php echo $form->labelEx($user_model, 'user_tel'); ?>
                                            <!--<label for="User_user_tel">手机</label>-->
                                        </td>
                                        <td>
                                            <?php echo $form->textField($user_model, 'user_tel', array('id' => 'User_user_tel')); ?>
                                            <?php echo $form->error($user_model, 'user_tel'); ?>
                                            <!--<input class="inputBg" size="25" name="User[user_tel]" id="User_user_tel" type="text" value="" />-->
                                        </td>
                                    </tr>
                                    <tr>
                                        <!--radioButtonList($model,$attribute,$data,$htmlOptions=array())-->
                                        <td align="right">
                                            <?php echo $form->labelEx($user_model, 'user_sex'); ?>
                                            <!--<label for="User_user_sex">性别</label>-->
                                        </td>
                                        <td>
                                            <?php echo $form->radioButtonList($user_model,'user_sex',$user_sex_list, array('separator'=>'&nbsp&nbsp')); ?>
                                            <!--<input id="ytUser_user_sex" type="hidden" value="" name="User[user_sex]" />-->
                                            <!--<span id="User_user_sex">-->
                                            <!--<input id="User_user_sex_0" value="1" checked="checked" type="radio" name="User[user_sex]" /> -->
                                            <!--<label for="User_user_sex_0">男</label>&nbsp;-->
                                            <!--<input id="User_user_sex_1" value="2" type="radio" name="User[user_sex]" /> -->
                                            <!--<label for="User_user_sex_1">女</label>&nbsp;-->
                                            <!--<input id="User_user_sex_2" value="3" type="radio" name="User[user_sex]" /> -->
                                            <!--<label for="User_user_sex_2">保密</label></span>                                -->
                                        </td>
                                    </tr>
                                    <tr>
                                        <!--dropDownList($model,$attribute,$data,$htmlOptions=array())-->

                                        <td align="right">
                                            <?php echo $form->labelEx($user_model, 'user_xueli'); ?>
                                            <!--<label for="User_user_xueli">学历</label>-->
                                        </td>
                                        <td>
                                            <?php echo $form->dropDownList($user_model, 'user_xueli', $user_xueli_list); ?>
                                            <?php echo $form->error($user_model, 'user_xueli'); ?>
                                            <!--<select name="User[user_xueli]" id="User_user_xueli">-->
                                            <!--    <option value="1" selected="selected">-请选择-</option>-->
                                            <!--    <option value="2">小学</option>-->
                                            <!---->
                                            <!--    <option value="3">初中</option>-->
                                            <!--    <option value="4">高中</option>-->
                                            <!--    <option value="5">大学</option>-->
                                            <!--</select>                                -->
                                            <!--<div class="errorMessage" id="User_user_xueli_em_" style="display:none"></div>                            -->
                                        </td>
                                    </tr>
                                    <tr>
                                        <!--checkBoxList($model,$attribute,$data,$htmlOptions=array())-->
                                        <td align="right">
                                            <?php echo $form->labelEx($user_model, 'user_hobby'); ?>
                                            <!--<label for="User_user_hobby">爱好</label>-->
                                        </td>

                                        <td>
                                            <?php echo $form->checkBoxList($user_model, 'user_hobby', $user_hobby_list, array('separator'=>'&nbsp&nbsp')); ?>
                                            <?php echo $form->error($user_model, 'user_hobby'); ?>
                                            <!--<input id="ytUser_user_hobby" type="hidden" value="" name="User[user_hobby]" />-->
                                            <!--<span id="User_user_hobby">-->
                                            <!--<input id="User_user_hobby_0" value="1" type="checkbox" name="User[user_hobby][]" /> -->
                                            <!--<label for="User_user_hobby_0">篮球</label>&nbsp;-->
                                            <!--<input id="User_user_hobby_1" value="2" type="checkbox" name="User[user_hobby][]" /> -->
                                            <!--<label for="User_user_hobby_1">足球</label>&nbsp;-->
                                            <!--<input id="User_user_hobby_2" value="3" type="checkbox" name="User[user_hobby][]" /> -->
                                            <!--<label for="User_user_hobby_2">排球</label>&nbsp;-->
                                            <!--<input id="User_user_hobby_3" value="4" type="checkbox" name="User[user_hobby][]" /> -->
                                            <!--<label for="User_user_hobby_3">棒球</label>-->
                                            <!--</span>                                -->
                                        </td>
                                    </tr>
                                    <tr>

                                        <!--textArea($model,$attribute,$htmlOptions=array())-->
                                        <td align="right">
                                            <?php echo $form->labelEx($user_model, 'user_introduce'); ?>
                                            <!--<label for="User_user_introduce">简介</label>-->
                                        </td>
                                        <td>
                                            <?php echo $form->textArea($user_model, 'user_introduce', array('id' => 'User_user_introduce','cols'=>50,'rows'=>5)); ?>
                                            <!--<textarea cols="50" rows="5" name="User[user_introduce]" id="User_user_introduce"></textarea>                      -->
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>&nbsp;</td>

                                        <td align="left">
                                            <input name="Submit" value="" class="us_Submit_reg" type="submit" />
                                        </td>
                                    </tr>
                                    <tr>
                                        <td colspan="2">&nbsp;</td>
                                    </tr>
                                </tbody>
                            </table>

                        <!--</form>       -->
                            <?php $this->endWidget(); ?>
                    </div>
                </div>
            </div>
            <!--放入view具体内容-->

        </div>

