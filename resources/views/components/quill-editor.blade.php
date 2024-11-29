<div>
    <div id="{{ $name }}-editor" style="height: 200px;"></div>
    <textarea id="{{ $name }}" name="{{ $name }}" hidden>{{ $value }}</textarea>
</div>

<script>
    document.addEventListener("DOMContentLoaded", function() {
        const quill = new Quill('#{{ $name }}-editor', {
            theme: 'snow',
        });

        // Set initial value
        let value = `{!! $value !!}`;
        if (value.includes('<p>')) {
            quill.root.innerHTML = `{!! $value !!}`;
        } else {
            quill.setText(value);
        }

        console.log("cara cek data value", {!! json_encode($value) !!});
        

        // Sync content with textarea
        quill.on('text-change', function() {
            document.getElementById('{{ $name }}').value = quill.root.innerHTML;
        });
    });
</script>
