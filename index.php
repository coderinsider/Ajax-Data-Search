<html>
<head>
  <title>Data Search Dashboard</title>
  <meta name="name" content="content">
</head>
<body>
  <form action="">
    find name: <input type="text" id="txt1"> <!-- onkeyup="showHit(this.value) -->
    <input type="submit" value="seach" name="seach" id="seach">
  </form>
  <p>Suggestion: <span id="txtHint"></span></p>

  <script>
  function showHit() {
    alert(0);
    var xhr;
    if(str.length == 0) {
      document.getElementById('txtHint').innerHTML = "";
      return;
    }

    xhr = new XMLHttpRequest();
    xhr.onreadystatechange = function() {
      if(this.readyState == 4 && this.status == 200) {
        document.getElementById('txtHint').innerHTML = this.responseText;
      }
    };
    xhr.open("GET", "getvalue.php?q="+str, true);
    xhr.send();
  }
  var click = document.getElementById("seach");
  click.addEventListener("click", showHit)

  </script>
</body>
</html>
