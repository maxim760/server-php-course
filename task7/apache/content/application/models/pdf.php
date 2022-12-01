<?php
class PdfModel extends Model {
    public function getAll() {
        return mysqli_query($this->connect, "select ID, title from pdfs");
    }
}