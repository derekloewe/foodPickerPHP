<?php include("../includes/helper.php");?>
<?php includeWithVariables("../includes/head.php", array('PageTitle' => 'Single Picker'))?>
<?php include("../includes/menu.php");?>
<div class="container">

    <h1 class="title">Restaurant Picker</h1>
    <div id="results">
        <div id="errorMessageBox"></div>
        <table class="table">
            <thead>
                <tr>
                    <td>Name</td>
                    <td id="costFilter">Cost </td>
                    <td id="typeFilter">Type </td>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td id="nameResult"> </td>
                    <td id="costResult"> </td>
                    <td id="typeResult"> </td>
                </tr>
            </tbody>
        </table>
        <!--Fix this, filting not correct-->
        <button class="button" id="buttonRandom">Random</button>

    </div>
    <div id="results">
        <table id="resultsList">
            <tr>
                <td>Name</td>
                <td>Type</td>
                <td>Side</td>
            </tr>
            <?php //$json = include("../food/read_return.php");
            $cURLConnection = curl_init();
            curl_setopt($cURLConnection, CURLOPT_URL, "http://localhost/code/php/foodPickerPHP/food/read.php");
            curl_setopt($cURLConnection, CURLOPT_RETURNTRANSFER, true);
            $foodsList = curl_exec($cURLConnection);
            curl_close($cURLConnection);
            
            $data = json_decode($foodsList);
            ?>

            <?php foreach($data->foods as $food): ?>
            <tr>
                <td><?=$food->name ?></td>
                <td><?=$food->type ?></td>
                <td><?=$food->side ?></td>
            </tr>
            <?php endforeach; ?>
        </table>
    </div>

    <div id="listingTable"></div>
    <a href="javascript:prevPage(dataR2)" id="btn_prev">Prev</a>
    <a href="javascript:nextPage(dataR2)" id="btn_next">Next</a>
    page: <span id="page"></span>
</div>

<?php include("../includes/footer.php");?>