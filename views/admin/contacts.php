<table class="table table-inverse">
    <thead>
    <tr>
        <th>First Name</th>
        <th>Last Name</th>
        <th>Email</th>
        <th>Society</th>
        <th>Phone</th>
        <th>Message</th>
        <th>Date</th>
        <th>Action</th>
    </tr>
    </thead>
    <tbody>
    <?php foreach ($contacts as $contact):?>
    <tr>
        <th scope="row"><?= $contact->firstname; ?></th>
        <td><?= $contact->lastname; ?></td>
        <td><?= $contact->email; ?></td>
        <td><?= $contact->society; ?></td>
        <td><?= $contact->phone; ?></td>
        <td><?= $contact->message; ?></td>
        <td><?= date('d/m/Y',strtotime( $contact->date)); ?></td>
        <td><a href="<?= BASE_URL;?>/admin/contacts/delete/<?= $contact->contactID; ?>" class="btn btn-danger">Delete</a></td>
    </tr>
    <?php endforeach;?>
    </tbody>
</table>