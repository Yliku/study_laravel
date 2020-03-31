<!DOCTYPE HTML>
<html>
<head>
  <!-- for latex表达式渲染 -->
  <script type="text/javascript" async src="https://cdn.mathjax.org/mathjax/latest/MathJax.js?config=TeX-MML-AM_CHTML"></script>
</head>
<body>
  <h1>我的 laravel 6.0 学习测试项目</h1>
  <div>插入行内公式（和span标签的效果一样）：    $$ x^2+y^2 $$     另一种写法：\(x^2+py^2\)      <div>
  <div>插入块状公式（和div标签的效果一样）： $$ x^2+y^2 $$       另一种写法：\[x^2+py^2\]      <div>
  <div>插入平方根公式： $$\sqrt {a+b}$$       </div>

  <!-- for mathjs -->
  <script src="https://unpkg.com/mathjs@6.5.0/dist/math.js"></script>
  <script type="text/javascript">
    console.log(math.sqrt(-4).toString()) // 2i
  </script>
</body>

</html>