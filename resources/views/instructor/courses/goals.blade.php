<x-instructor-layout>
    <x-slot name="course">
        {{$course->slug}}
    </x-slot>

    <div>
        @livewire('instructor.courses-goals', ['course' => $course], key('course-goals'.$user->id))
    </div>

    <div class="mt-8">
        @livewire('instructor.courses-requirements', ['course' => $course], key('course-requirements'.$user->id))
    </div>

    <div class="mt-8">
        @livewire('instructor.courses-audiences', ['course' => $course], key('course-requirements'.$user->id))
    </div>

</x-instructor-layout>
