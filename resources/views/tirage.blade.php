@extends('layout')
@section('content')
    <div class="w-96 mt-8 mx-auto bg-white border rounded py-4 px-2 shadow">
        <form method="POST" action="{{route('tirage')}}" class="flex items-center">
            @csrf
            <input type="number" required value="{{$number}}" name="number" id="" class="flex-1 border rounded py-1 px-2 font-bold text-center text-xl" placeholder="283">
            <button class="w-36 border rounded py-2 px-3 font-bold bg-green-600 text-white">Voir</button>
        </form>

        <div class="text-center py-4 border-b">
            @foreach ($tirage as $k=>$item)
            <div class="this_tirage inline-block m-1 w-8 h-8 text-center text-xl border border-2 rounded-full bg-gray-400 text-white align-middle @if( $k === 'C' ) bg-green-600 text-white is_c  @endif">
                {{ $item }}
            </div>
            @endforeach            
        </div>
        <div class="numbers">
            <?php $iteration = 1; ?>
            @foreach ($my_numbers as $num)
                @if ($iteration == 1)
                    <div class="text-center py-1 border relative">
                        <input type="text" value="{{$num}}" placeholder="0" class="this_number inline-block w-12 mr-1 p-2 text-center text-xl border border-2 border-gray-300 rounded-full bg-gray-100">                      
                        <?php $iteration++ ?>
                @else
                    @if ($iteration == 6)
                        <input type="text" value="{{$num}}" placeholder="0" class="this_number inline-block w-12 mr-1 p-2 text-center text-xl border border-2 border-gray-300 rounded-full bg-gray-100">                      
                        <?php $iteration=1; ?>
                        <div class="remove-line absolute top-0 right-0 bg-red-600 text-white rounded pt-0 px-1 hover:bg-red-800 cursor-pointer">x</div>
                    </div>
                    @else
                        <input type="text" value="{{$num}}" placeholder="0" class="this_number inline-block w-12 mr-1 p-2 text-center text-xl border border-2 border-gray-300 rounded-full bg-gray-100">                      
                        <?php $iteration++ ?> 
                    @endif

                @endif           
            @endforeach
           
        </div>

        <div class="py-2 text-center">
            <button class="add-line bg-gray-600 rounded shadow border text-white text-4xl pb-2 px-3">+</button>
            <button class="resultat bg-gray-600 rounded shadow border text-white text-4xl pb-2 px-3">Resultats</button>
        </div>
        <script>
            $(document).ready(function(){
                $('.add-line').on('click', function(){
                    var line = `
                    <div class="text-center py-1 border relative">
                            <input type="text" placeholder="0" class="this_number inline-block w-12 mr-1 p-2 text-center text-xl border border-2 border-gray-300 rounded-full bg-gray-100">               
                            <input type="text" placeholder="0" class="this_number inline-block w-12 mr-1 p-2 text-center text-xl border border-2 border-gray-300 rounded-full bg-gray-100">               
                            <input type="text" placeholder="0" class="this_number inline-block w-12 mr-1 p-2 text-center text-xl border border-2 border-gray-300 rounded-full bg-gray-100">               
                            <input type="text" placeholder="0" class="this_number inline-block w-12 mr-1 p-2 text-center text-xl border border-2 border-gray-300 rounded-full bg-gray-100">
                            <input type="text" placeholder="0" class="this_number inline-block w-12 mr-1 p-2 text-center text-xl border border-2 border-gray-300 rounded-full bg-gray-100">               
                            <input type="text" placeholder="0" class="this_number inline-block w-12 mr-1 p-2 text-center text-xl border border-2 border-gray-300 rounded-full bg-gray-100">
                            <div class="remove-line absolute top-0 right-0 bg-red-600 text-white rounded pt-0 px-1 hover:bg-red-800 cursor-pointer">x</div>
                    </div>
                    `;
                    $('.numbers').append(line);                    
                });

                $(document).on('click', '.remove-line', function(){
                    $(this).parent().remove();
                });
            });
        </script>
    </div>   
@endsection
