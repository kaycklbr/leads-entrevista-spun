@extends('layouts.app')

@section('content')
<div class="content">
    <div class="d-flex gap-2 align-items-center">
        <h3 class="title ">Leads</h3>
    </div>


    <section class="leads quiz-card mt-3">
        <div class="text-end mb-2">
            <button class="btn btn-primary" onclick="exportToCsv('Leads.csv')">Exportar CSV</button>
        </div>
        <div class="table-responsive">
            <table class="table table-borderless table-hover">
                <thead>
                    <tr>
                        <th>Nome</th>
                        <th>E-mail</th>
                        <th>Capturado em</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($leads as $lead)
                    <tr>
                        <td>{{ $lead->name }}</td>
                        <td>{{ $lead->email }}</td>
                        <td>{{ $lead->created_at }}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </section>
</div>
@endsection

@section('scripts')
<script>

    let data = JSON.parse(`{!! $leads->toJson() !!}`);

    function exportToCsv(filename) {
        data = data.map(d => ({id: d.id, name: d.name, email: d.email, created_at: d.created_at}))
        const headers = Object.keys(data[0]);
        const csvContent = headers.join(";") + "\n" + data.map(item => Object.values(item).join(";")).join("\n");


        var blob = new Blob([csvContent], { type: 'text/csv;charset=utf-8,\uFEFF;' });
        if (navigator.msSaveBlob) { // IE 10+
            navigator.msSaveBlob(blob, filename);
        } else {
            var link = document.createElement("a");
            if (link.download !== undefined) {
                var url = URL.createObjectURL(blob);
                link.setAttribute("href", url);
                link.setAttribute("download", filename);
                link.style.visibility = 'hidden';
                document.body.appendChild(link);
                link.click();
                document.body.removeChild(link);
            }
        }
    }
</script>
@endsection