import cv2
import numpy as np
from scipy import ndimage

def remove_noise(input_image_path, output_image_path, filter_type='median', kernel_size=3, sigma=0.5):
    """
    Функција за уклањање шума са слике користећи различите типове филтера.

    Параметри:
    input_image_path (str): Путања до улазне слике.
    output_image_path (str): Путања где ће се сачувати обрађена слика.
    filter_type (str): Тип филтера за уклањање шума ('median', 'average', 'gaussian', 'bilateral', 'wavelet').
    kernel_size (int): Величина језгра за филтрирање (подразумевано је 3).
    sigma (float): Стандардна девијација за Гаусово замућење и таласну трансформацију (подразумевано је 0.5).

    Враћа:
    None
    """

    # Учитавање слике
    image = cv2.imread(input_image_path, cv2.IMREAD_COLOR)
    if image is None:
        print(f'Није могуће учитати слику: {input_image_path}')
        return

    # Избор методе филтрирања
    if filter_type == 'median':
        filtered_image = cv2.medianBlur(image, kernel_size)
    elif filter_type == 'average':
        kernel = np.ones((kernel_size, kernel_size), np.float32)/(kernel_size*kernel_size)
        filtered_image = cv2.filter2D(image, -1, kernel)
    elif filter_type == 'gaussian':
        filtered_image = cv2.GaussianBlur(image, (kernel_size, kernel_size), sigma)
    elif filter_type == 'bilateral':
        filtered_image = cv2.bilateralFilter(image, kernel_size, 75, 75)
    elif filter_type == 'wavelet':
        filtered_image = ndimage.gaussian_filter(image, sigma)
    else:
        return False

    # Чување резултирајуће слике
    cv2.imwrite(output_image_path, filtered_image)
