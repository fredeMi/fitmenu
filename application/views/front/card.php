<div class="col my-4">
    <h4 class="m-2 p-2 border-bottom"><?= $cat->name ?></h4>
    <table class="table table-striped my-3">
        <tbody>
            <?foreach($products as $prod){?>
            <tr>
                <td><?= $prod->name ?></td>
                <td><?= $prod->description ?></td>
                <td><?= $prod->price ?> €</td>
                <!-- <td><img src="<?//= $prod->image ?>" alt="<?//= $prod->name ?>" width="50"></td> -->
            </tr>
            <?}?>
        </tbody>
    </table>

</div>
</div>