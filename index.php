<?
    $connection = new PDO('mysql:host=localhost; dbname=academy; charset=utf8', 'root', '');
    $profile = $connection->query('SELECT * FROM `profile`');
    $profile = $profile->fetchAll();

    $education = $connection->query('SELECT * FROM `education` ORDER BY yearEnd DESC');
    $languages = $connection->query('SELECT * FROM `languages`');
    $interests = $connection->query('SELECT * FROM `interests`');
    $about = $connection->query('SELECT * FROM `about`');
    $about = $about->fetchAll();
    $experience = $connection->query('SELECT * FROM `experience` ORDER BY yearEnd DESC');
    $projects = $connection->query('SELECT * FROM `projects`');
    $skills = $connection->query('SELECT * FROM `skills`');


?>
<!DOCTYPE html>
<!--[if IE 8]> <html lang="en" class="ie8"> <![endif]-->
<!--[if IE 9]> <html lang="en" class="ie9"> <![endif]-->
<!--[if !IE]><!--> <html lang="en"> <!--<![endif]-->
<head>
    <title>Responsive Resume/CV Template for Developers</title>
    <!-- Meta -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Responsive HTML5 Resume/CV Template for Developers">
    <meta name="author" content="Xiaoying Riley at 3rd Wave Media">
    <link rel="shortcut icon" href="favicon.ico">
    <link href='https://fonts.googleapis.com/css?family=Roboto:400,500,400italic,300italic,300,500italic,700,700italic,900,900italic' rel='stylesheet' type='text/css'>
    <!-- Global CSS -->
    <link rel="stylesheet" href="assets/plugins/bootstrap/css/bootstrap.min.css">
    <!-- Plugins CSS -->
    <link rel="stylesheet" href="assets/plugins/font-awesome/css/font-awesome.css">

    <!-- Theme CSS -->
    <link id="theme-style" rel="stylesheet" href="assets/css/styles.css">
    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>

<body>
<div class="wrapper">
    <div class="sidebar-wrapper">
        <div class="profile-container">
            <img class="profile" src="assets/images/photo1.jpg" alt="" />
            <h1 class="name"><?=$profile[0]['name']?></h1>
            <h3 class="tagline"><?=$profile[0]['post']?></h3>
        </div><!--//profile-container-->

        <div class="contact-container container-block">
            <ul class="list-unstyled contact-list">
                <li class="email"><i class="fa fa-envelope"></i><a href="mailto: <?=$profile[0]['email']?>"><?=$profile[0]['email']?></a></li>
                <li class="phone"><i class="fa fa-phone"></i><a href="tel:<?=$profile[0]['phone']?>"><?=$profile[0]['phone']?></a></li>
                <li class="website"><i class="fa fa-globe"></i><a href="<?=$profile[0]['site']?>" target="_blank"><?=$profile[0]['site']?></a></li>
<!--                <li class="linkedin"><i class="fa fa-linkedin"></i><a href="#" target="_blank">linkedin.com/in/alandoe</a></li>-->
<!--                <li class="github"><i class="fa fa-github"></i><a href="#" target="_blank">github.com/username</a></li>-->
<!--                <li class="twitter"><i class="fa fa-twitter"></i><a href="https://twitter.com/3rdwave_themes" target="_blank">@twittername</a></li>-->
            </ul>
        </div><!--//contact-container-->
        <div class="education-container container-block">
            <h2 class="container-block-title">Образование</h2>
            <? foreach($education as $educationItem): ?>
            <div class="item">
                <h4 class="degree"><?=$educationItem['speciality']?></h4>
                <h5 class="meta"><?=$educationItem['title']?></h5>
                <div class="time"><?=$educationItem['yearStart']?> - <?=$educationItem['yearEnd']?> </div>
            </div><!--//item-->
            <? endforeach; ?>
        </div><!--//education-container-->

        <div class="languages-container container-block">
            <h2 class="container-block-title">Языки</h2>
            <ul class="list-unstyled interests-list">
                <? foreach($languages as $lang): ?>
                    <li><?=$lang['title']?> <span class="lang-desc">(<?=$lang['level']?>)</span></li>
                <? endforeach; ?>
            </ul>
        </div><!--//interests-->

        <div class="interests-container container-block">
            <h2 class="container-block-title">Интересы</h2>
            <ul class="list-unstyled interests-list">
                <? foreach($interests as $interest): ?>
                    <li><?=$interest['title']?></li>
                <? endforeach; ?>
            </ul>
        </div><!--//interests-->

    </div><!--//sidebar-wrapper-->

    <div class="main-wrapper">

        <section class="section summary-section">
            <h2 class="section-title"><i class="fa fa-user"></i>Обо мне</h2>
            <div class="summary">
                <?=$about[0]['title']?>
            </div><!--//summary-->
        </section><!--//section-->

        <section class="section experiences-section">
            <h2 class="section-title"><i class="fa fa-briefcase"></i>Опыт работы</h2>
            <? foreach($experience as $exp): ?>
            <div class="item">
                <div class="meta">
                    <div class="upper-row">
                        <h3 class="job-title"><?=$exp['post']?></h3>
                        <div class="time"><?=$exp['yearStart']?> - <?=$exp['yearEnd'] ?: 'По настоящее время'?></div>
                    </div><!--//upper-row-->
                    <div class="company"><?=$exp['company']?>, <?=$exp['city']?></div>
                </div><!--//meta-->
                <div class="details">
                    <?=$exp['about']?>
                </div><!--//details-->
            </div><!--//item-->
            <? endforeach; ?>
        </section><!--//section-->

        <section class="section projects-section">
            <h2 class="section-title"><i class="fa fa-archive"></i>Проекты</h2>
            <div class="intro">
                <p>You can list your side projects or open source libraries in this section. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vestibulum et ligula in nunc bibendum fringilla a eu lectus.</p>
            </div><!--//intro-->
            <? foreach($projects as $project): ?>
            <div class="item">
                <span class="project-title"><a href="//<?=$project['link']?>"><?=$project['title']?></a></span> - <span class="project-tagline"><?=$project['about']?></span>
            </div><!--//item-->
            <? endforeach; ?>
        </section><!--//section-->

        <section class="skills-section section">
            <h2 class="section-title"><i class="fa fa-rocket"></i>Навыки</h2>
            <div class="skillset">
                <? foreach ($skills as $skill): ?>
                <div class="item">
                    <h3 class="level-title"><?=$skill['title']?></h3>
                    <div class="level-bar">
                        <div class="level-bar-inner" data-level="<?=$skill['level']?>%">
                        </div>
                    </div><!--//level-bar-->
                </div><!--//item-->
                <? endforeach; ?>
            </div>
        </section><!--//skills-section-->

        <form action="#" method="POST">
            <textarea style="display: block; margin-left: auto; margin-right: auto; margin-top: 10px" name="comment" cols="30" rows="10" placeholder="Оставить отзыв"></textarea>
            <button style="display: block; margin-left: auto; margin-right: auto; margin-top: 10px">Отправить отзыв</button>
        </form>


        <!--Если пользователь что-то отправил в форму, то делаем запись в БД.-->
        <?
            function clean($value = "") {
                $value = trim($value);
                $value = stripslashes($value);
                $value = strip_tags($value);
                $value = htmlspecialchars($value);

                return $value;
            }
            if ($_POST['comment']) {
                $comment = $_POST['comment'];
                $comment = clean($comment);
//                $connection->query("INSERT INTO `comments` (`comment`) VALUES ('$comment')");
                $safe = $connection->prepare("INSERT INTO `comments` SET comment=:comment");
                $arr = ['comment'=>$comment];
                $safe->execute($arr);
            }
            $commentsOfUsers = $connection->query('SELECT * FROM `comments`');
            foreach ($commentsOfUsers as $key => $comment) {
        ?>

        <div style="font-size: 25px; margin: auto">
            <?=($key + 1) . ' ' . $comment['comment']?>
        </div>
        <? } ?>

    </div><!--//main-body-->
</div>

<!--<footer class="footer">-->
<!--    <div class="text-center">-->
        <!--/* This template is released under the Creative Commons Attribution 3.0 License. Please keep the attribution link below when using for your own project. Thank you for your support. :) If you'd like to use the template without the attribution, you can check out other license options via our website: themes.3rdwavemedia.com */-->
<!--        <small class="copyright">Designed with <i class="fa fa-heart"></i> by <a href="http://themes.3rdwavemedia.com" target="_blank">Xiaoying Riley</a> for developers</small>-->
<!--    </div>-->
    <!--//container-->
<!--</footer>-->
<!--//footer-->

<!-- Javascript -->
<script type="text/javascript" src="assets/plugins/jquery-1.11.3.min.js"></script>
<script type="text/javascript" src="assets/plugins/bootstrap/js/bootstrap.min.js"></script>
<!-- custom js -->
<script type="text/javascript" src="assets/js/main.js"></script>
</body>
</html>

