<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Подача документів</title>
  
  <?php include('./bootstrapInfo.php') ?>
</head>

<body>
  <div class="container">
    <div class="jumbotron">
      <h1 class="display-4">Подача документів в приймальну комісію.</h1>
      <a class="text-mutted" onclick="easyMode()" id="changeSize">
        Збільшити розмір полів
      </a>
      <hr />
    </div>
    <form class="needs-validation" action="step2.php" method="post" novalidate>
      <!-- ПІБ -->
      <div class="mb-3">
        <label for="inputPIB" class="form-label">Введіть ваші дані</label>
        <input type="text" class="form-control" id="inputSurname" required name="Surname" placeholder="Прізвище" />

        <input type="text" class="form-control" id="inputName" required name="Name" placeholder="Імя" />

        <input type="text" class="form-control input-lg" id="inputFatherName" required name="FatherName" placeholder="По батькові" />

        <div class="invalid-feedback">Будь ласка, заповніть всі поля</div>
      </div>
      <!-- Місце проживання -->
      <div class="mb-3">
        <label for="inputAddress" class="form-label">Адреса проживання</label>

        <div class="mb-3">
          <input type="text" class="form-control" id="validationServer01" placeholder="Вулиця" required name="street" />
          <!-- <div class="invalid-feedback">Введіть вулицю</div> -->
          <input type="text" class="form-control" id="validationServer02" placeholder="Будинок" required name="house" />
          <!-- <div class="invalid-feedback">Введіть номер будинку</div> -->

          <div class="input-group">
            <input type="text" class="form-control" id="validationServerUsername" placeholder="Квартира*" aria-describedby="inputGroupPrepend3" name="kvart" />
            <!-- <div class="invalid-feedback">Введіть квартиру</div> -->
          </div>
          <small class="text-mutted">*Необовязкове поле</small>
        </div>
        <div class="mb-3">
          <input type="text" class="form-control" id="validationServer03" placeholder="Місто/Село/Селище" required name="city" />
          <input type="text" class="form-control" id="validationServer03" placeholder="Область" required name="obl" />
          <!-- <div class="invalid-feedback">Введіть назву</div> -->

          <input type="text" class="form-control" id="validationServer04" placeholder="Індекс" required name="zip" />

          <div class="invalid-feedback">Заповніть поля</div>
        </div>
      </div>
      <!-- Місце народження -->

      <!-- Дата народження -->
      <div class="mb-3">
        <label for="inputBirthday" class="form-label">Дата народження</label>
        <input type="date" class="form-control" id="inputBirthday" required name="BDate" placeholder="Дата народження" />
        <div class="invalid-feedback">
          Будь ласка, вкажіть вашу дату народження
        </div>
      </div>
      <!-- Номер телефону -->
      <div class="mb-3">
        <label for="inputPhone" class="form-label">Номер телефону</label>
        <div class="input-group">
          <div class="input-group-prepend">
            <span class="input-group-text" id="basic-addon1">+380</span>
          </div>
          <input type="tel" class="form-control" id="inputPhone" required name="phone" pattern="[0-9]{9}" maxlength="9" minlength="9" placeholder="961111111" />
          <div class="invalid-feedback">
            Будь ласка, вкажіть номер телефону в коректному форматі
          </div>
        </div>
      </div>
      <!-- Електрона пошта -->
      <div class="mb-3">
        <label for="inputEmail" class="form-label">Електрона пошта</label>
        <input type="email" class="form-control" id="inputEmail" name="email" required placeholder="vstup@nltu.edu.ua" />
        <div class="invalid-feedback">
          Будь ласка, вкажіть вашу електрону адресу в форматі
          vstup@nltu.edu.ua
        </div>
      </div>
      <!-- Освітній ступін -->
      <div class="mb-3">
        <label for="stupin" class="form-label">Освітній ступінь</label>
        <div class="form-check">
          <input class="form-check-input" type="radio" name="stupinRadio" id="stupinRadio1" value="0" checked />
          <label class="form-check-label" for="stupinRadio1">
            Бакалавр
          </label>
        </div>
        <div class="form-check">
          <input class="form-check-input" type="radio" name="stupinRadio" id="stupinRadio2" value="1" />
          <label class="form-check-label" for="stupinRadio2"> Магістр </label>
        </div>
      </div>
      <!-- Форма навчання -->
      <div class="mb-3">
        <label for="formaNavch" class="form-label">Форма навчання</label>
        <div class="form-check">
          <input class="form-check-input" type="radio" name="formaNavchRadio" id="formaNavchRadio1" value="1" checked />
          <label class="form-check-label" for="formaNavchRadio1">
            Денна
          </label>
        </div>
        <div class="form-check">
          <input class="form-check-input" type="radio" name="formaNavchRadio" id="formaNavchRadio2" value="1" />
          <label class="form-check-label" for="formaNavchRadio2">
            Заочна(дистанційна)
          </label>
        </div>
        <div class="form-check">
          <input class="form-check-input" type="radio" name="formaNavchRadio" id="formaNavchRadio3" value="2" />
          <label class="form-check-label" for="formaNavchRadio3">
            Вечірня
          </label>
        </div>
      </div>
      <!-- Інститут -->
      <div class="mb-3">
        <label for="institute" class="form-label">Інститут</label>
        <div class="form-check">
          <input class="form-check-input" type="radio" name="instituteRadio" id="instituteRadio1" value="0" checked />
          <label class="form-check-label" for="instituteRadio1">
            ІДКТД
          </label>
        </div>
        <div class="form-check">
          <input class="form-check-input" type="radio" name="instituteRadio" id="instituteRadio2" value="1" disabled />
          <label class="form-check-label" for="instituteRadio2">
            ЛІСПГ
          </label>
        </div>
        <div class="form-check">
          <input class="form-check-input" type="radio" name="instituteRadio" id="instituteRadio3" value="2" disabled />
          <label class="form-check-label" for="instituteRadio3">
            ІМАКІТ
          </label>
        </div>
        <div class="form-check">
          <input class="form-check-input" type="radio" name="instituteRadio" id="instituteRadio4" value="3" disabled />
          <label class="form-check-label" for="instituteRadio4"> ЕЕМ </label>
        </div>
      </div>
      <!-- Спеціальність -->
      <div class="mb-3">
        <label for="specialnist" class="form-label">Виберіть спеціальність (можна декілька)</label>
        <select name="spec[]" class="form-select" size="3" multiple>
          <option value="122" selected>122 Компютерні Науки</option>
          <option value="126">126 Інформаційні системи та технології</option>
        </select>
      </div>

     

      <ul class="nav nav-tabs" id="myTab" role="tablist">
        <li class="nav-item" role="presentation">
          <button class="nav-link active" id="home-tab" data-bs-toggle="tab" data-bs-target="#home" type="button" role="tab" aria-controls="home" aria-selected="true"> Я після коледжу</button>
        </li>
        <li class="nav-item" role="presentation">
          <button class="nav-link" id="profile-tab" data-bs-toggle="tab" data-bs-target="#profile" type="button" role="tab" aria-controls="profile" aria-selected="false"> Я після 11 класу</button>
        </li>
        
      </ul>
      <div class="tab-content" id="myTabContent">
        <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab"><?php require('./college.php')?></div>
        <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab"><?php require('./school.php')?></div>
      </div>




      

      <!-- <button type="submit" id="submit" class="btn btn-primary">
        Наступний крок
      </button> -->
    </form>
  </div>
</body>
<script>
  const bDate = document.getElementById("inputBirthday");
  const date1 = new Date();
  bDate.setAttribute("max", 1900 + date1.getYear() - 16 + "-08-01");
  bDate.setAttribute("min", 1900);
</script>
<script src="script.js"></script>

</html>