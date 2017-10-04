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
                <th scope="row"><?= $images[$work->image_id]->name; ?></th>
                <td><?= $work->title; ?></td>
                <td><?= $work->content; ?></td>
                <td><?= $work->date; ?></td>
                <td>
                    <a href="" class="btn btn-primary">edit</a>
                    <a href="" class="btn btn-danger">delete</a>
                </td>
            </tr>
    <?php endforeach; ?>
    </tbody>
</table>
