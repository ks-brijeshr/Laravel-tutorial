<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>home</title>
</head>

<body>
    <nav>
        <x-nav-link href="/">Home</x-nav-link>
        <x-nav-link href="/about" style="color: green;">about</x-nav-link>
        <x-nav-link href="/contact">contact</x-nav-link>
    </nav>

    <!-- n Laravel, the $slot variable is used in Blade components to represent the content that you pass between the opening and closing tags of a component. -->
    {{$slot}}
</body>

</html>