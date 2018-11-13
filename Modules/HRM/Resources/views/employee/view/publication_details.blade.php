@foreach($employee->employeePublicationInfo as $publication)
    <table class="table">
        <tbody>
        <tr>
            <th scope="col">Type of publication</th>
            <td>{{$publication->type_of_publication}}</td>
        </tr>
        <tr>
            <th scope="col">Author Name</th>
            <td>{{$publication->author_name}}</td>
        </tr>
        <tr>
            <th scope="col">Publication title</th>
            <td>{{$publication->publication_title}}</td>
        </tr>
        <tr>
            <th scope="col">Publication company</th>
            <td>{{$publication->publication_company}}</td>
        <tr>
            <th scope="col">Publication company location</th>
            <td>{{$publication->publication_company_location}}</td>
        </tr>
        <tr>
            <th scope="col">Publication date</th>
            <td>{{$publication->published_date}}</td>
        </tr>

        </tbody>
    </table>
@endforeach
<a class="btn btn-small btn-info" href="{{ url('/hrm/employee/' . $employee->id . '/edit#publication') }}">Edit </a>