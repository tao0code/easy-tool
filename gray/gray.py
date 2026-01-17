from PIL import Image
import os.path
import argparse

def gray(photo_path,save_path=None):
    #判断图片是否存在
    if not os.path.exists(photo_path):
        raise FileNotFoundError(f"图片{photo_path}不存在!")
#     打开图片
    try:
        open_image = Image.open(photo_path)
        end_image = open_image.convert("L") #核心转灰色

    except Exception as e:
        raise ValueError(f"图片打开失败:{e}")
    #如果存在路劲不存在情况
    if save_path is None:
        dir_name,file_name = os.path.split(photo_path)  #拆分开来将文件和格式
        name,ext = os.path.join(dir_name,file_name) #新文件名
        #保存文件
        save_path = os.path.join(dir_name,f"{name}_gray{ext}")

    #保存结果
    end_image.save(save_path)
    print(f"✅图片生成成功！{save_path}")

def main():
    #参数解析
    commend = argparse.ArgumentParser(description="图片灰色生成器")
    #参数
    commend.add_argument("-photo",required=True,help="选择的图片路径（必须填写）")
    commend.add_argument("-save",required=False,help="图片保存路径,如不填则保存到当前目录")

    args = commend.parse_args() #解析参数
    photo_path = args.photo.strip()
    save_path = args.save.strip() if args.save else None

    #调函数
    try:
        gray(photo_path, save_path)
    except FileExistsError as e:
        print(f"❌失败，{e}")  #文件/目录
        exit(1) #结束
    except ValueError as e:  #格式
        print(f"❌失败，{e}")
        exit(1)
    except Exception as e:  #处理
        print(f"❌失败，{e}")
        exit(1)

#入口
if __name__ == "__main__":
    main()

