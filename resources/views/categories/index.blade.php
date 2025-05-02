@extends('layouts.master')

@section('heading', 'Your Categories')

@section('content')
    <ul>
        @foreach($categories as $category)
            <li class="flex justify-between py-3 border-b border-gray-300">
                <a href="{{ route('categories.show', $category) }}" class="hover:underline">
                    {{ $category->name }}
                </a>

                <form method="post" action="{{ route('categories.destroy', $category) }}">
                    @csrf
                    @method('DELETE')
                    <button class="cursor-pointer">
                        <svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" width="20" viewBox="0,0,256,256">
                            <g fill-opacity="0.83137" fill="#ff0000" fill-rule="nonzero" stroke="none" stroke-width="1"
                               stroke-linecap="butt" stroke-linejoin="miter" stroke-miterlimit="10" stroke-dasharray=""
                               stroke-dashoffset="0" font-family="none" font-weight="none" font-size="none"
                               text-anchor="none"
                               style="mix-blend-mode: normal">
                                <g transform="scale(10.66667,10.66667)">
                                    <path
                                        d="M10,2l-1,1h-5v2h1v15c0,0.52222 0.19133,1.05461 0.56836,1.43164c0.37703,0.37703 0.90942,0.56836 1.43164,0.56836h10c0.52222,0 1.05461,-0.19133 1.43164,-0.56836c0.37703,-0.37703 0.56836,-0.90942 0.56836,-1.43164v-15h1v-2h-5l-1,-1zM7,5h10v15h-10zM9,7v11h2v-11zM13,7v11h2v-11z">
                                    </path>
                                </g>
                            </g>
                        </svg>
                    </button>
                </form>
            </li>

        @endforeach

        <li class="py-3">
            <x-add-link href="{{ route('categories.create') }}">Add Category</x-add-link>
        </li>
    </ul>

@endsection
