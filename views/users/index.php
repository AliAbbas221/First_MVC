<h1>Courses</h1>

<nav>
        <ul>
            <li><a href="/darrebni5/">Home</a></li>
            
        </ul>
    </nav>
<table>
    <thead>
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Price</th>
           
        </tr>
    </thead>
    <tbody>
        <?php foreach ($courses as $course): ?>
            <tr>
                <td><?= $course->getId() ?></td>
                <td><?= $course->getname() ?></td>
                <td><?= $course->getprice() ?></td>
                <td>
                   <form method='POST' action='/darrebni5/buycourse/<?php echo $course->getId();?>'><button>Buy</button></form>

                </td>
            </tr>
        <?php endforeach ?>
    </tbody>
</table>