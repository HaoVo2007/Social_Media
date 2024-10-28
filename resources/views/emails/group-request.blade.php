<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <style>
        .flex {
            display: flex;
            align-items: center;
            gap: 15px;
        }
    </style>
</head>

<body>
    <h1>Hello!</h1>
    <p>User {{ $user->name }} has requested to join the group {{ $group->name }}.</p>
    <div class="flex">
        <p>
            <a href="{{ $acceptUrl }}" style="color: green; font-weight: bold;">Accept Request</a>
        </p>
        <p>
            <a href="{{ $rejectUrl }}" style="color: red; font-weight: bold;">Reject Request</a>
        </p>
    </div>
    <p>Thank you for using our application!</p>
</body>
</html>
