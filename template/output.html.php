<!DOCTYPE html>
<html lang="kr" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>글 목록</title>
  </head>
  <body>
    <?php if (isset($e)): ?>
      <p>
        <?= $e ?>
      </p>
    <?php else: ?>
      <?php foreach ($jokes as $joke): ?>
        <blockquote>
          <p>
            <?= htmlspecialchars($joke, ENT_QUOTES, 'UTF-8') ?>
          </p>
        </blockquote>
      <?php endforeach; ?>
    <?php endif; ?>
  </body>
</html>
