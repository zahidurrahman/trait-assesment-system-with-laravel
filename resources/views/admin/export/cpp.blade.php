<table class="table">
    <thead class="thead-light">
    <tr>
        <th scope="col">Respondent ID</th>
        <th scope="col">Brown</th>
        <th scope="col">Yellow</th>
        <th scope="col">Red</th>
        <th scope="col">Pink</th>
        <th scope="col">Green</th>
        <th scope="col">Blue</th>
    </tr>
    </thead>
    <tbody>
    @foreach($users as $share)
        <tr>
            <td>{{$share->owner->name}}</td>
            <td>{{$share->score_cluster1}}</td>
            <td>{{$share->score_cluster2}}</td>
            <td>{{$share->score_cluster3}}</td>
            <td>{{$share->score_cluster4}}</td>
            <td>{{$share->score_cluster5}}</td>
            <td>{{$share->score_cluster6}}</td>
        </tr>
    @endforeach
    </tbody>
</table>