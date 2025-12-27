import hashlib

print("""
    ///////// MD5 /////////
   //                   //
  //  /\\    /\\    /\\   //
 //  //\\\\  //\\\\  //\\\\  //
//  ///\\\\\\///\\\\\\///\\\\\\ //
\\\\  \\\\///\\\\///\\\\///  \\\\
 \\  \\\\//  \\\\//  \\\\//   \\
  \\                   /
   \\\\\\\\\\\\\\ MD5 \\\\\\\\\\\\\\
""")
while True:
    input_str = input("输入转换的MD5值:").strip()
    # 非空判断
    if not input_str:
        print(f"不能为空！，请输入值")
    else:
        byte = input_str.encode('utf-8')

        result = hashlib.md5(byte).hexdigest()

        print(f"MD5的结果为：{result}")