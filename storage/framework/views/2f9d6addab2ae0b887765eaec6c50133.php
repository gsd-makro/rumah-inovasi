<div>
    <div id="<?php echo e($name); ?>-editor" style="height: 200px;"></div>
    <textarea id="<?php echo e($name); ?>" name="<?php echo e($name); ?>" hidden><?php echo e($value); ?></textarea>
</div>

<script>
    document.addEventListener("DOMContentLoaded", function() {
        const quill = new Quill('#<?php echo e($name); ?>-editor', {
            theme: 'snow',
        });

        // Set initial value
        let value = `<?php echo $value; ?>`;
        if (value.includes('<p>')) {
            quill.root.innerHTML = `<?php echo $value; ?>`;
        } else {
            quill.setText(value);
        }

        console.log("cara cek data value", <?php echo json_encode($value); ?>);
        

        // Sync content with textarea
        quill.on('text-change', function() {
            document.getElementById('<?php echo e($name); ?>').value = quill.root.innerHTML;
        });
    });
</script>
<?php /**PATH /Users/adi/Documents/project/rumah-inovasi/resources/views/components/quill-editor.blade.php ENDPATH**/ ?>