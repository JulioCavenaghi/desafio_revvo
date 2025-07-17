document.addEventListener('DOMContentLoaded', () => {
    const { isEdit, courseId, apiBase } = COURSE_FORM_CONFIG;
    const titleEl = document.getElementById('title');
    const fileEl = document.getElementById('image');
    const descEl = document.getElementById('description');
    const urlEl = document.getElementById('url');
    const btn = document.getElementById('submitBtn');
    let existingImageBase64 = '';

    if (isEdit && courseId) {
        fetch(`${apiBase}/${courseId}`)
        .then(res => res.json())
        .then(data => {
            titleEl.value = data.title;
            descEl.value = data.description;
            urlEl.value = data.url;
            existingImageBase64 = data.image;
        })
        .catch(err => {
            console.error('Erro ao buscar curso:', err);
            alert('Não foi possível carregar os dados do curso.');
        });
    }

    btn.addEventListener('click', () => {
        const MAX_SIZE = 1 * 1024 * 1024; 

        if (fileEl.files && fileEl.files[0]) {
            if (fileEl.files[0].size > MAX_SIZE) {
                const sizeMB = (fileEl.files[0].size / (1024*1024)).toFixed(2);
                alert(`Este arquivo tem ${sizeMB} MB, mas o limite é 1 MB.`);
                return;
            }
        }

        const convertAndSubmit = (base64Image) => {
            const payload = {
                title: titleEl.value,
                image: base64Image,
                description: descEl.value,
                url: urlEl.value
            };
            const method = isEdit ? 'PUT' : 'POST';
            const url = isEdit
                ? `${apiBase}/${courseId}`
                : apiBase;

            fetch(url, {
                method,
                headers: { 'Content-Type': 'application/json' },
                body: JSON.stringify(payload)
            })
            .then(async res => {
                const data = await res.json();
                return { status: res.status, data };
            })
            .then(resp => {
                alert(resp.data.message || 'Operação realizada com sucesso!');
                if (resp.status === 201) {
                    window.location.href = '../../';
                }
            })
            .catch(err => {
                console.error(err);
                alert('Ocorreu um erro. Tente novamente.');
            });
        };

        if (fileEl.files && fileEl.files[0]) {
            const reader = new FileReader();
            reader.onload = () => convertAndSubmit(reader.result.split(',')[1]);
            reader.readAsDataURL(fileEl.files[0]);
        } else {
            convertAndSubmit(existingImageBase64);
        }
    });
});