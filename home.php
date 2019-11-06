
<?php include_once('nav.html'); ?>

<div style="text-align:center;margin: auto 20%;" id="container">

    <p>
        Eodem tempore etiam Hymetii praeclarae indolis viri negotium est
        actitatum, cuius hunc novimus esse textum. cum Africam pro consule
        regeret Carthaginiensibus victus inopia iam lassatis, ex horreis
        Romano populo destinatis frumentum dedit, pauloque postea cum
        provenisset segetum copia, integre sine ulla restituit mora.

    </p>

    <section id="search">
        <form action="search.php" method="POST">
            <input type="text" name="search" id="search" placeholder="your search term here">
            <input type="submit" name="submit" value="search">
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
        // include_once('4randomMovies.php');
    </section>

</div>