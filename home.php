
<?php include_once('nav.html'); ?>

<div style="text-align:center;margin: auto 20%;" id="container">

    <p>
        Eodem tempore etiam Hymetii praeclarae indolis viri negotium est
        actitatum, cuius hunc novimus esse textum. cum Africam pro consule
        regeret Carthaginiensibus victus inopia iam lassatis, ex horreis
        Romano populo destinatis frumentum dedit, pauloque postea cum
        provenisset segetum copia, integre sine ulla restituit mora.

    </p>

    <section id="searchSection">
        <form action="movies.php" method="POST">
            <input type="text" name="queryFromHome" id="search" placeholder="your search term here">
            <input type="submit" name="submit" value="search">
            <div style="border: solid 2px blue;" id="results">
              ... autocomplete will be here ...
            </div>
        </form>
    </section>

    <section id="categoriesHome">
        <ul style="display:flex; justify-content: space-evenly;">
            // include_once('categoriesHome.php');
            <li><a href="categories.php?categrory=1">category1 (count)</a></li>
            <li><a href="categories.php?categrory=2">category2 (count)</a></li>
            <li><a href="categories.php?categrory=3">category3 (count)</a></li>
            <li><a href="categories.php?categrory=4">category4 (count)</a></li>
        </ul>
    </section>

    <section id="4randomMovies">
        <?php include_once('4randomMovies.php'); ?>
    </section>

</div>

<script src=" https://code.jquery.com/jquery-3.4.1.min.js"
    integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous">
    </script>

  <script>
    $(function () {
      $('#search').keyup(function (e) {
        e.preventDefault();
        $.ajax({
          url: 'searchAutoComplete.php',
          type: 'post',
          dataType: "html",
          data: { search: $(this).val() },
          success: function (result) {
            //console.log(result);
            $('#results').show();
            $('#results').html(result);
            $("#results").css("background-color", "#ccc");
          },
          error: function (err) {
            // IF AJAX ERROR HAPPENED
          }
        });
      });
    });

    function selectCountry(val) {
      $("#search").val(val);
      $("#results").hide();
    }
  </script>