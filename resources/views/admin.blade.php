@include('layouts.header')
@include('layouts.app')

<body>
   

    <table width="100%" border="1" cellpadding="4" cellspacing="0">


        
        @foreach ($comments as $comment)    
    
      {{ $list->date }}  
        @endforeach 


    <table width="100%" border="1" cellpadding="4" cellspacing="0">


        
    @foreach ($conference_list as $list)    

  {{ $list->date }}  
    @endforeach 


</body>

