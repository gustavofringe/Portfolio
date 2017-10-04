<table class="table table-inverse">
    <thead>
    <tr>
        <th>Images</th>
        <th>title</th>
        <th>Content</th>
        <th>Date</th>
        <th>Action</th>
    </tr>
    </thead>
    <tbody>
    <?php foreach ($works as $work): ?>
            <tr>
                    <?php foreach($images as $image):?>
                <th scope="row"><img src="<?= BASE_URL.'/public/img/'.$image->folder.DS.$image->name;?>" alt=""><?= $image->name;?><br></th>
            <?php endforeach;?>
                <td><?= $work->title; ?></td>
                <td><?= $work->content; ?></td>
                <td><?= date('d/m/Y', strtotime($work->date)); ?></td>
                <td>
                    <a href="" class="btn btn-primary">edit</a>
                    <a href="" class="btn btn-danger">delete</a>
                </td>
            </tr>
    <?php endforeach; ?>
    </tbody>
</table>
