<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <title>Файл</title>
    <?php require_once 'application/_helper.php'; defineTheme(); ?>
</head>
<body>
<a href="./index.html">На главную</a>
<form id="form">
    Выберите пдф файл
    <input type="file" name="file" accept="application/pdf" id="pdf-input">
    <button type="submit" name="submit" value="Upload">Загрузить</button>
</form>
<h4>Все пдф из базы данных</h4>

<div style="display: flex; flex-direction: column">

    <?php
    /** @var TYPE_NAME $data */
    foreach ($data as $item) {
            $id = $item['ID'];
            echo "<div class='item' style='display: flex; align-items: center; column-gap: 20px'>
                <button onclick='onClickBlob(\"{$id}}\", \"{$item['title']}\")'>Скачать</button>
                <div>{$id}) - {$item['title']}</div>
            </div>";
        }
    ?>
</div>
<script>
    const downloadBlob = async (blob, fileName) => {
        const url = URL.createObjectURL(blob);
        const link = document.createElement("a")
        link.download = fileName
        link.href = url;
        document.body.append(link)
        link.click()
        link.remove()
        URL.revokeObjectURL(url)
    }
    const onClickBlob = async(id, name) => {
        try {
            const res = await fetch(`/api/pdf.php?id=${id}`)
            const blob = await res.blob()
            await downloadBlob(blob, name)
        } catch {
            alert("Ошибка")
        }
    }
    const onChangeFile = (e) => {
        if(!e.target.files?.[0]) {
            return;
        }
        const sizeMB = e.target.files[0].size / 1024 / 1024
        if(sizeMB > 80) {
            alert(`Максимальный размер - 80Мб`)
            e.target.value = ''
        }
    }
    document.querySelector("#pdf-input").addEventListener("change", onChangeFile)
    const form = document.getElementById("form")
    form.addEventListener("submit", async (e) => {
        e.preventDefault()
        console.log("form load")
        try {
            const formData = new FormData(e.target)
            console.log(formData)
            const response = await fetch("./api/pdf.php", {
                method: "POST",
                body: formData,
            })
            const result = await response.json()
            window.location.reload()
        } catch {
            alert("Ошибка при добавлении")
        }
    })
</script>
</body>
</html>