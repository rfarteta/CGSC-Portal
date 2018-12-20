<?php
include("validation.php");
include("carousel.php"); 
include("header.php"); 
?>
<section id="page">
    <header id="pageheader" class="normalheader">
        <h2 class="sitedescription">
        </h2>
    </header>

    <section id="contents">

        <article class="post">
            <header class="postheader">
                <h2 class= "mx-5">Contact us</h2>
            </header>
            <section class="entry">
                <?php
            if(isset($_POST["name"]))
            {
            include("conection.php");
            $sql="INSERT INTO contact (name, emailid, contactno, subject, message) VALUES ('$_POST[name]','$_POST[email]','$_POST[contact]','$_POST[subject]','$_POST[message]')";
            if (!mysql_query($sql,$con))
            {
            die('Error in mysql: ' . mysql_error());
            }
            else
            {
            echo "Mail sent Successfully...";
            }
            }
            else
            {
	  ?>
                <div class="row">
                    <div class="col-md-6">
                        <form class ="mx-5" name="form1" method="post" action="" id="formID">
                            <p class="textfield">
                                <div class="form-group">
                                    <input class="form-control" name="name" id="name" value="" size="22" tabindex="1"
                                        type="text" class="validate[required,custom[onlyLetterSp]] text-input">
                                    <label for="author">
                                        <small>Name (required)</small>
                                    </label>
                                </div>
                            </p>
                            <p class="textfield">
                                <div class="form-group">
                                    <input class="form-control" name="email" id="email" value="" size="22" tabindex="2"
                                        type="text" class="validate[required,custom[email]] text-input">
                                    <label for="email">
                                        <small>Mail (will not be published) required)</small>
                                    </label>
                                </div>
                            </p>
                            <p class="textfield">
                                <input class="form-control" name="contact" id="contact" value="" size="22" tabindex="3"
                                    type="text" class="validate[required,custom[phone]] text-input">
                                <label for="url1">
                                    <small>Contact No</small>
                                </label>
                            </p>
                            <p class="textfield">
                                <input class="form-control" name="subject" id="subject" value="" size="22" tabindex="3"
                                    type="text" class="validate[required] text-input">
                                <label for="url">
                                    <small>Subject</small>
                                </label>
                            </p>
                            <p>
                                <small><strong>Message</strong></small>
                                :</p>
                            <p class="text-area">
                                <textarea name="message" id="message" class="validate[required]" cols="50" rows="10"
                                    tabindex="4"></textarea>
                            </p>
                            <p>
                                <div class="btn-group" data-toggle="buttons">
                                    <input class="btn btn-primary" name="submit" id="submit" tabindex="5" type="button"
                                        value="Submit">
                                    <input name="comment_post_ID" value="1" type="hidden">
                                </div>
                            </p>
                            <div class="clear"></div>
                        </form>
                        <?php
  }
  ?>
                        <div class="clear"></div>
            </section>
        </article>


    </section>
    <section id="sidebar">
        </ul>
        <h2>&nbsp;</h2>
    </section>
    <div class="clear"></div>

    <div class="clear"></div>
</section>
</div>
</div>
</div>

<?php include("footer.php"); ?>