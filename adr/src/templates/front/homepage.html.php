<!DOCTYPE html>
<html>
    <head>
        <title>ADR - Action Domain Responder</title>
        <meta charset="UTF-8"/>
        <link rel="stylesheet" href="//cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" crossorigin="anonymous">
    </head>
    <body>
        <div class="container">
            <div class="row">
                <h1>Livre d'or</h1>

                <?php include 'include/_form.html.php'; ?>

                <ul class="list-group mt-3">
                    <?php foreach ($comments as $comment) { ?>
                        <li class="list-group-item">
                            <strong><?= $comment->username ?></strong>
                            <p><?= $comment->message ?></p>
                        </li>
                    <?php } ?>
                </ul>
            </div>
        </div>
    </body>
</html>
