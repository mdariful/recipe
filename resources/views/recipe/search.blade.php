@if (count($searchResult) === 0)
Nessuna ricetta trovata
@elseif (count($searchResult) >= 1)
... print out results
    @foreach($searchResult as $ricetta)
    print ricetta
    @endforeach
@endif