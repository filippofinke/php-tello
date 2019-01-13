Get video stream at 10 fps:

ffmpeg -i udp://0.0.0.0:11111 -pix_fmt rgb24 -vf fps=10 %04d.jpg