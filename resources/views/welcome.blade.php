<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <title>Currency Converter</title>

  <!-- Fonts -->
  <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
  <!-- CSS -->
  <link href="/css/main.css" rel="stylesheet">


</head>

<body>
  <div class="converter">
    <form>
      <div class="header">Currency Converter</div>
      <div class="body">
        <div class="from">
          <select class="cur" id="from:select">
            <?php
            for ($row = 0; $row <= 30; $row++) {
              echo '<option id="' . $phpArray3[$row]['currency'] . '" value="' . $phpArray3[$row]['rate'] . '">' . $phpArray3[$row]['currency'] . '</option>';
            }
            ?>
          </select>
          <form method="post" action="">
            <input class="amount" id="from:input" type="text" maxlength="8" value="" oninput="magicFunc()" />
          </form>
        </div>
        <div class="symb">&#8674;</div>
        <div class="to">
          <input class="amount" id="to:input" type="text" maxlength="8" />
          <select class="cur" id="to:select">
            <?php
            for ($row = 0; $row <= 30; $row++) {
              echo '<option id="' . $phpArray3[$row]['currency'] . '" value="' . $phpArray3[$row]['rate'] . '">' . $phpArray3[$row]['currency'] . '</option>';
            }
            ?>
          </select>
        </div>
      </div>
      <div class="footer">
        <input class="date" id="date" type="date" />
      </div>
    </form>
    <div class="header">
      <div class="title">
        <h4>Exchange Rates</h4>
      </div>
    </div>
    <div class="table">
      <table>
        <thead>
          <tr>
            <th>Currency</th>
            <th>Rate</th>
          </tr>
        </thead>
        <tbody>
          <?php
          for ($row = 0; $row <= 30; $row++) {
            echo '<tr><td>' . $phpArray3[$row]['currency'] . '</td>';
            echo '<td>' . $phpArray3[$row]['rate'] . '</td></tr>';
          }
          ?>
        </tbody>
      </table>
    </div>
  </div>
  <script>
    function magicFunc() {
      var select = document.getElementById('from:select');
      var output = select.options[select.selectedIndex].value;
      var x = document.getElementById("from:input").value;
      document.getElementById("to:input").value = x * output;
    }
  </script>
</body>

</html>