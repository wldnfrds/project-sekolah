<x-layout>

    <x-header></x-header>

    <!-- Hero Section -->
    <x-hero></x-hero>
    <!-- /Hero Section -->

    <!-- About Section -->
    <x-about></x-about>
    <!-- /About Section -->

    <!-- Counts Section -->
    <x-count :$usersCount :$newsCount :$teachersCount></x-count>
    <!-- /Counts Section -->

    <!-- majors Section -->
    <x-majors></x-majors>
    <!-- /majors Section -->

    <!-- guru Index Section -->
    <x-teacher :$teachers />
    <!-- /guru Index Section -->

    <x-footer></x-footer>

</x-layout>
