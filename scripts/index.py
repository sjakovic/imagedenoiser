import cv2
import argparse
import noise_removal

if __name__ == "__main__":
    parser = argparse.ArgumentParser(description='Skripta za uklanjanje šuma sa slike koristeći Gaussian blur.')
    parser.add_argument('image_path', type=str, help='Putanja do slike koja se obrađuje.')
    parser.add_argument('output_path', type=str, help='Putanja za sačuvanu obrađenu sliku.')
    parser.add_argument('--blur_ksize', type=int, default=5, help='Veličina kernela za Gaussian blur. Default je 5.')
    parser.add_argument('--filter_type', type=str, help='Tip filtera')

    args = parser.parse_args()

    # Proverite da li je blur_ksize neparan broj, ako ne, povećajte za 1
    if args.blur_ksize % 2 == 0:
        args.blur_ksize += 1

    noise_removal.remove_noise(args.image_path, args.output_path, args.filter_type, args.blur_ksize)
