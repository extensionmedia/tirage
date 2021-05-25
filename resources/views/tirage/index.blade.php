@extends('container.app')
@section('content')

    <div class="bg-white px-2 shadow">
        <div class="flex items-center justify-between bg-white py-2">
            <select name="" id="" class="border rounded-md px-4 py-2">
                <option value="2021" selected >2021</option>
                <option value="2020">2020</option>
            </select>
            <button class="bg-gray-400 text-white py-1 px-3 rounded border">Chercher</button>
        </div>
        @for ($i = 61; $i > 0; $i--)
            <div class="flex items-center justify-between border-b py-4 text-gray-700">
                <div class="flex grap-4 items-center">
                    <span class="text-xs font-bold mr-4"># {{$i}}</span>
                    <span class="border border-white rounded-full w-10 h-8 text-center bg-blue-100 shadow">12</span>
                    <span class="border border-white rounded-full w-10 h-8 text-center bg-blue-100 shadow">8</span>
                    <span class="border border-white rounded-full w-10 h-8 text-center bg-blue-100 shadow">14</span>
                    <span class="border border-white rounded-full w-10 h-8 text-center bg-blue-100 shadow">46</span>
                    <span class="border border-white rounded-full w-10 h-8 text-center bg-blue-100 shadow">37</span>
                    <span class="border border-white rounded-full w-10 h-8 text-center bg-blue-100 shadow">49</span>
                    <span class="ml-4 border border-white rounded-full w-10 h-8 text-center bg-green-200 shadow">3</span>
                </div>
                <button class="mr-2 py-1 px-2 text-xs text-gray-400 hover:text-gray-700 cursor-pointer">
                    <i class="fas fa-chevron-down"></i>
                </button>
            </div>
        @endfor


    </div>
@endsection