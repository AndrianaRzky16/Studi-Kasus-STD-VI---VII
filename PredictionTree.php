<?php
// Kelas Node untuk merepresentasikan setiap node dalam BST
class TreeNode
{
 public $value;
 public $left;
 public $right;

 public function __construct($value)
 {
  $this->value = $value;
  $this->left = null;
  $this->right = null;
 }
}

// Kelas untuk mengimplementasikan struktur Binary Search Tree
class PredictionTree
{
 public $root;

 public function __construct()
 {
  $this->root = null;
 }

 // Fungsi untuk menambahkan nilai prediksi ke dalam BST
 public function addPrediction($value)
 {
  $newNode = new TreeNode($value);
  if ($this->root === null) {
   $this->root = $newNode;
  } else {
   $this->insertNode($this->root, $newNode);
  }
 }

 // Fungsi rekursif untuk menyisipkan node baru ke dalam BST
 private function insertNode($node, $newNode)
 {
  if ($newNode->value < $node->value) {
   if ($node->left === null) {
    $node->left = $newNode;
   } else {
    $this->insertNode($node->left, $newNode);
   }
  } else {
   if ($node->right === null) {
    $node->right = $newNode;
   } else {
    $this->insertNode($node->right, $newNode);
   }
  }
 }

 // Fungsi untuk menampilkan prediksi secara terurut
 public function displayPredictions($node)
 {
  if ($node !== null) {
   $this->displayPredictions($node->left);
   echo "Prediction Accuracy: " . $node->value . "%\n";
   $this->displayPredictions($node->right);
  }
 }
}

// Contoh penggunaan

echo "Author: 231232017 Andriana Rizki Barokah \n";
echo "=============================================\n\n";

$modelTree = new PredictionTree();
// Menambahkan prediksi ke dalam tree
$modelTree->addPrediction(78.5);
$modelTree->addPrediction(85.3);
$modelTree->addPrediction(90.4);
$modelTree->addPrediction(80.1);

// Menampilkan hasil prediksi yang diurutkan dari rendah ke tinggi
$modelTree->displayPredictions($modelTree->root);
