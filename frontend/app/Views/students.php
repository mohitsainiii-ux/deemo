<!DOCTYPE html>
<html>

<head>

    <title>Student Management</title>

    <style>

        body {
            font-family: Arial, sans-serif;
            background: #f4f4f4;
            padding: 40px;
        }

        .container {
            width: 800px;
            margin: auto;
            background: white;
            padding: 30px;
            border-radius: 10px;
        }

        input {
            width: 100%;
            padding: 10px;
            margin: 8px 0;
            box-sizing: border-box;
        }

        button {
            padding: 10px 20px;
            cursor: pointer;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 30px;
        }

        th,
        td {
            border: 1px solid #ddd;
            padding: 12px;
            text-align: left;
        }

        th {
            background: #f2f2f2;
        }

    </style>

</head>

<body>

<div class="container">

    <h1>Student Management</h1>


    <!-- Add Student Form -->

    <h2>Add Student</h2>

    <form method="post" action="/students/create">

        <input
            type="text"
            name="name"
            placeholder="Student Name"
            required
        >

        <input
            type="email"
            name="email"
            placeholder="Student Email"
            required
        >

        <input
            type="text"
            name="course"
            placeholder="Course"
            required
        >

        <button type="submit">
            Add Student
        </button>

    </form>


    <!-- Student List -->

    <h2>Students</h2>

    <table>

        <thead>

            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Email</th>
                <th>Course</th>
            </tr>

        </thead>

        <tbody>

            <?php foreach ($students as $student): ?>

                <tr>

                    <td>
                        <?= esc($student['id']) ?>
                    </td>

                    <td>
                        <?= esc($student['name']) ?>
                    </td>

                    <td>
                        <?= esc($student['email']) ?>
                    </td>

                    <td>
                        <?= esc($student['course']) ?>
                    </td>

                </tr>

            <?php endforeach; ?>

        </tbody>

    </table>

</div>

</body>

</html>