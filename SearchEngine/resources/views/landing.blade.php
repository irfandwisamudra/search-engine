<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>22-083_SearchBook</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>

<body>
  <nav class="navbar navbar-expand-lg navbar-dark bg-info">
    <div class="container">
      <a class="navbar-brand" href="#">Book Searching</a>
    </div>
  </nav>
  <main role="main">
    <div class="container pt-3">
      <div class="card my-2">
        <div class="card-body">
          <h5 class="card-title">Nama: Irfan Dwi Samudra</h5>
          <p class="card-text">NIM: 220411100083</p>
        </div>
      </div>
      <form action="#" method="GET" onsubmit="return false">
        <div class="input-group">
          <input type="text" class="form-control" placeholder="Search the Book" name="q" id="cari">
          <select class="form-select" name="rank" id="rank">
            <option value="5">5</option>
            <option value="10">10</option>
            <option value="20">20</option>
          </select>
          <button class="btn btn-primary" type="submit" id="search">Search</button>
        </div>
      </form>
    </div>
  </main>
  <div class="container mt-4">
    <div class="row" id="content">

    </div>
  </div>

  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
  <script>
    $(document).ready(function() {
      $("#search").click(function() {
        var cari = $("#cari").val();
        var rank = $("#rank").val();
        $.ajax({
          url: '/search?q=' + cari + '&rank=' + rank,
          dataType: "json",
          success: function(data) {
            $('#content').html(data);
          },
          error: function(data) {
            alert("Please insert your command");
          }
        });
      });
    });
  </script>
</body>

</html>
