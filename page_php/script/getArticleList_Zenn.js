// zenn apiのurlからjsonの値を取得する
const res = fetch(`${ZENN_API_URL}/${ZENN_API_QUERY}`);
const result = res.json();

console.log(result);