<h1>Courses</h1>

<nav>
        <ul>
            <li><a href="/darrebni5/Admin">Home</a></li>
            
        </ul>
    </nav>
<table>
    <thead>
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Price</th>
            <form method="POST" action="ADDCOUSRE"><button>ADD</button></form>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($courses as $course): ?>
            <tr>
                <td><?= $course->getId() ?></td>
                <td><?= $course->getname() ?></td>
                <td><?= $course->getprice() ?></td>
                <td>
                <form method="POST" action="Editcourse/<?php echo $course->getId();?>"><button>Edit</button></form>
                <form method="POST" action="Deletecourse/<?php echo $course->getId();?>"><button>Delete</button></form>
                </td>
                
            </tr>
        <?php endforeach ?>
    </tbody>
</table>