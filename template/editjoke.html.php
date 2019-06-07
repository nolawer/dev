<form action="" method="post">
  <input type="hidden" name="id" value="<?=$joke['id']?>">
  <label for="joketext">글을 입력해주세요.</label>
  <textarea id="joketext" name="joketext" rows="8" cols="80">
    <?=$joke['joketext']?>
  </textarea>
  <input type="submit" name="submit" value="저장">
</form>
